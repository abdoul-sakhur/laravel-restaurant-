<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'desciption',
    ];

    public function ImageUrl(): string
    {
        return Storage::url($this->image);
    }
}
