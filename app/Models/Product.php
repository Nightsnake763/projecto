<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'stock', 'category_id', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    protected $appends = ['short_descript', 'short_name'];

    public function getShortDescriptAttribute()
    {
        return \Str::limit($this->description, 117);
    }

    public function getShortNameAttribute()
    {
        return \Str::limit($this->name, 20);
    }
}
