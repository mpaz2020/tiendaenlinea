<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubCategory extends Model
{

    protected $fillable=['category_id','name', 'slug', 'description'];


    public function categories(){
        return $this->belongsTo(Category::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function my_store($request)
    {
        self::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name,'_'),
            'description'=>$request->description,
            'category_id'=>$request->category_id,
        ]);
    }
    public function my_update($request)
    {
        $this->update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name,'_'),
            'description'=>$request->description,
        ]);
    }
}
