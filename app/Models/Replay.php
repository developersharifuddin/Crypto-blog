<?php

namespace App\Models;
use PhpParser\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Replay extends Model
{
    use HasFactory, SoftDeletes;
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
