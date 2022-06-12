<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_category_id',
        'code',
        'name',
        'note'
    ];

    public static function findCateoryData($category)
    {
        return Category::whereName($category)->select(['id', 'code'])->firstOrFail();
    }
}
