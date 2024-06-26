<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Category extends Model implements TranslatableContract
{
    use Translatable, HasFactory, SoftDeletes, HasEagerLimit;


    public $translatedAttributes = ['title', 'content'];
    protected $fillable = ['image', 'parent'];

    public function parent(){
        return $this->belongsTo(Category::class, 'parent');
    }

    public function children(){
        return $this->hasMany(Category::class,'parent');
    }

    public function post(){
        return $this->hasMany(Post::class);
    }
}
