<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Product extends Model
{
    
    use HasFactory, Notifiable;
    protected $guarded =[];

    protected $fillable = [];

    public function category()
    {
        return $this->hasMany(Category::class, 'id', 'category_id');
    }

}
