<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $primaryKey = 'url';

    protected $fillable = [

    'user_id',
    'file_id' ,
    'is_valid',
    'url',
    'is_reusable',
    ];
}
