<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
        'is_active',
    ];

    // Relasi ke produk
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Relasi ke subkategori
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Relasi ke induk kategori
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
