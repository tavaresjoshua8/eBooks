<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
    	'category_id', 'folio', 'name', 'slug', 'author', 'translation', 'editorial', 'issue', 'country', 'year', 'pages', 'review', 'image', 'pdf'
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
