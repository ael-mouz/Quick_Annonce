<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\announcement;

class category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'cat',
        'sub_cat',
        'description',
    ];

    protected $casts = [
        'cat' => 'string',
        'sub_cat' => 'string',
        'description' => 'string',
    ];

    public function announcement()
    {
        return $this->hasMany(announcement::class, 'category', 'id');
    }
}
