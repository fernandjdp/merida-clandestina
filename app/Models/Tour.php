<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'duration',
        'cost',
        'image_id'
    ];

    public function image() {
        $this->belongsTo(Image::class);
    }

    public function images() {
        $this->hasMany(Image::class);
    }
}
