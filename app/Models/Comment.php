<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $primaryKey = 'id';

    protected $fillable = ['post_id', 'name', 'comment'];


    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    /*public function user()
    {
        return $this->belongTo(Post::class, 'user_id');
    }*/

}
