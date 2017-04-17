<?php
namespace Carawebs\Blog\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Define Post model.
 */
class BlogPost extends Model
{
    //protected $table = 'blog_posts';

    protected $fillable = [
      'title',
      'content',
      'excerpt',
      'slug',
      'user_id'
    //   'thumbnail',
    //  'published_at'
    ];

    function __construct()
    {
        // var_dump($this->fillable);
    }

    /**
     * A Post belongs to a single User.
     *
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function images()
    {
        return $this->belongsToMany('BlogImage');
    }
}
