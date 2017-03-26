<?php
namespace Carawebs\Blog\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Define POst model.
 */
class Post extends Model
{
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
}
