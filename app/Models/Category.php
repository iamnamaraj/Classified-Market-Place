<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category', 'name', 'slug'];


    public function parentCategory() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function childCategories() : HasMany
    {
        return $this->hasMany(cateogry::class);
    }


}
