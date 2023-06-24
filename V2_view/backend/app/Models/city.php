<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\announcement;

class city extends Model
{
    use HasFactory;
    protected $table = 'city';

    protected $fillable = [
        'name',
        'zip_code',
    ];

    protected $casts = [
        'name' => 'string',
        'zip_code' => 'integer',
    ];

    public function announcement()
    {
        return $this->hasMany(announcement::class, 'city');
    }
}
