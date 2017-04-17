<?php
namespace Carawebs\Blog\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Define Image model.
 */
class BlogImage extends Model
{
    protected $fillable = [
        'filename',
        'title',
        'alt',
        'description',
        'filePath',
    ];

    function __construct()
    {
        // var_dump($this->fillable);
    }

    /**
     * An Image belongs to a single User.
     *
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function posts()
    {
        return $this->belongsToMany('BlogPost', 'blog_image_post', 'image_id', 'post_id');
    }
}
