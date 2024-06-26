<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    public $asYouType = true;
    
    protected $fillable=[
        'name',
    ];
    
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    
    
}
