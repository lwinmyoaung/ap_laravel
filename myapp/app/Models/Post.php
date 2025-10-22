<?php

namespace App\Models;

use App\Mail\PostStored;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'posts';
    // protected $fillable = ['name', 'description'];
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }

    protected static function booted()
    {
        // static::created(function ($post) {
        //     // Send Email when Post Created Using Hook Event
        //     Mail::to('lwin@gmail.com')->send(new PostStored($post));
        // });
    }
}