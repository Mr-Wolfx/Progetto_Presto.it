<?php

namespace App\Models;

use App\Models\Image;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use Searchable;
    use HasFactory;

    protected $fillable=[
        'name',
        'price',
        'body',
        'category_id',
    ];
    
    public $asYouType = true;

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function  toSearchableArray()
    {
        $category = $this->category;
        $array = [
            'name'=>$this->name,
            'body'=>$this->body,
            'price'=>$this->price,
            'category'=>$category,
            'id'=>$this->id,

        ];
        return $array;
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public static function toBeRevisionedCount()
    {
        return Article::where('is_accepted', null)->count();
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
