<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Category extends Model
{
    use HasFactory;

    public static function boot(){
        parent::boot();

        self::deleting(function ($category){
            $category->books()->delete();
        });
    }

    protected $table = 'categories';
    protected $fillable = [
      'label',
    ];

    public function books(){
        return $this->hasMany(Book::class);
    }
    public $timestamps = true;
}
