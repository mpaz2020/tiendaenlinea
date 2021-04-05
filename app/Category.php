<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    //
    protected $fillable=['name', 'icon','slug', 'description'];


    public function products(){
        return $this->hasMany(Product::class);
    }
    public function sub_categories(){
        return $this->hasMany(SubCategory::class);
    }
    public function my_store($request)
    {
        self::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name,'_'),
            'icon'=>$request->icon,
            'description'=>$request->description,
        ]);
    }
    public function my_update($request)
    {
        $this->update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name,'_'),
            'icon'=>$request->icon,
            'description'=>$request->description,
        ]);
    }
}
