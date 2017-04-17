<?php

namespace Carawebs\Blog\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carawebs\Blog\Models\BlogPost;
use Carawebs\Blog\Requests\StoreBlogPost;
use Carawebs\Blog\Requests\UpdateBlogPost;
//use App\Tag;
//use Carbon\Carbon;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $articles = BlogPost::with('user')->latest('updated_at')->get();
        $current_user = Auth::user();
        return view('blog::posts.index', compact('articles', 'current_user'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $tags = NULL;//Tag::pluck('name', 'id');
        return view('blog::posts.create', compact('tags'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  StoreBlogPost  $request
    * @return \Illuminate\Http\Response
    */
    public function store(StoreBlogPost $request)
    {
        $request['slug'] = str_slug($request->title, '-');
        $post = new BlogPost();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->excerpt = $request->excerpt;
        $post->slug = str_slug($request->title, '-');
        $user = Auth::user();
        $user->posts()->save($post);

        \Session::flash('flash_message', 'Your article has been created');
        return redirect()->route('posts.index');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    // public function show($id)
    public function show(Post $post)
    {
        $article = $post; //Post::findOrFail($id);
        $current_user = Auth::user();
        return view('blog::posts.show', compact('article', 'current_user'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $tags = NULL;//Tag::pluck('name', 'id');
        $article = BlogPost::findOrFail($id);
        return view('blog::posts.edit', compact('article', 'tags'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  UpdateBlogPost  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(UpdateBlogPost $request, $id)
    {
        $article = BlogPost::findOrFail($id);
        $article->update($request->all());
        //$article->thumbnail = $this->storeImageS3($request, $article);
        $this->syncTags($article, $request->input('tag_list'));
        $article->save();
        return redirect()->route('posts.show', $id);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        BlogPost::destroy($id);
        return redirect()->route('posts.index');
    }

    private function storeImage(Requests\PostRequest $request, $article)
    {
        $image = $request->file('thumbnail');
        $imageName = str_slug($article->title) . '-' . $article->id . '-' . $image->getClientOriginalName();
        $imagePath = public_path('images');
        $image->move($imagePath, $imageName);

        return '/images/' . $imageName;
    }

    private function storeImageS3(Requests\PostRequest $request, $article)
    {
        return $request->file('thumbnail')->store('articles', 's3');
    }

    /**
    * Sync the tags for this article.
    *
    * Updates the pivot table.
    *
    * @param  Post $article Post object
    * @param  array   $tags    $request->input('tag_list')
    */
    private function syncTags(BlogPost $article, $tags = [])
    {
        if (empty($tags)) {
            return;
        }

        $article->tags()->sync($tags);
    }

    /**
    * Save a new article.
    *
    * @param  PostRequest $request [description]
    * @return [type]                  [description]
    */
    private function createPost(StoreBlogPost $request)
    {
        $request['slug'] = str_slug($request->title, '-');

        // dd($request->all());
        $article = Auth::user()
        ->posts()
        ->save(new BlogPost($request->all()));

        // OR
        //Auth::user()->articles()->create($request->all());

        // @TODO Tags!
        //$this->syncTags($article, $request->input('tag_list'));
        return $article;
    }
}
