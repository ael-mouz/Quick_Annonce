<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'username',
        'email',
        'phone',
        'category',
        'city',
        'title',
        'description',
        'price',
        'picture_1',
        'picture_2',
        'picture_3',
        'picture_4',
        'picture_5',
        'is_validated',
    ];
}
