<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table         = "comment";
    protected $primaryKey     = 'id_comment';

    protected $fillable = ['id_comment', 'id_user', 'nama','email','comment'];
}
