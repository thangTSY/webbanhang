<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [];

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
