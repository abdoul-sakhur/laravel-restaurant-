<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'imageP',
        'imageS',
        'imageT',
        'stock',
        'quality',
    ];

    public function imagePurl(): string
    {
        return Storage::url($this->imageP);
    }

    public function imageSurl(): string
    {
        return Storage::url($this->imageS);
    }

    public function imageTurl(): string
    {
        return Storage::url($this->imageT);
    }
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
