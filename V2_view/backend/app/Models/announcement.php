<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;
use App\Models\city;

class announcement extends Model
{
    use HasFactory;

    protected $table = 'announcement';


    protected $fillable = [
        'username',
        'email',
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

    protected $casts = [
        'username' => 'string',
        'email' => 'string',
        'category' => 'integer',
        // 'city' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'price' => 'float',
        'picture_1' => 'string',
        'picture_2' => 'string',
        'picture_3' => 'string',
        'picture_4' => 'string',
        'picture_5' => 'string',
        'is_validated' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(category::class, 'category', 'id');
    }

    public function city()
    {
        return $this->belongsTo(city::class, 'city', 'id');
    }

}
