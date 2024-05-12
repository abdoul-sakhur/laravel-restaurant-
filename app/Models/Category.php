<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function ImageUrl(): string
    {
        return Storage::url($this->image);
    }
}
