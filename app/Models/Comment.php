<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comments';
    protected $fillable = [
        'content',
        'user_id',
        'commentable_id',
        'commentable_type'
    ];

    public $casts = [
        'enable' => 'boolean',
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }


}
