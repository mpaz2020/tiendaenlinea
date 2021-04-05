<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Return_;

class Product extends Model
{
    protected $fillable = [
        'code',
        'name',
        'slug',
        'status',
        'sell_price',
        'sub_category_id',
        'provider_id',
        'short_description',
        'long_description'
    ];

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function my_store($request)
    {
        $product = self::create([
            'code' => $request->code,
            'name' => $request->name,
            'slug' => Str::slug($request->name, '_'),
            'sell_price' => $request->sell_price,
            'sub_category_id' => $request->sub_category_id,
            'provider_id' => $request->provider_id,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
        ]);
        $product->tags()->attach($request->get('tags'));
        $this->generate_code($product);
        $this->upload_files($request, $product);
    }
    public function my_update($request)
    {
        $this->update([
            'code' => $request->code,
            'name' => $request->name,
            'slug' => Str::slug($request->name, '_'),
            'sell_price' => $request->sell_price,
            'sub_category_id' => $request->sub_category_id,
            'provider_id' => $request->provider_id,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
        ]);

        $this->tags()->sync($request->get('tags'));
        $this->generate_code($this);
        $this->upload_files($request, $this);
    }

    public function generate_code($product)
    {
        $code = str_pad($product->id, 8, "0", STR_PAD_LEFT);
        $product->update(['code' => $code]);
    }

    public function upload_files($request, $product)
    {
        $urls = [];
        if ($request->hasFile('images')) {

            $images = $request->file('images');

            foreach ($images as $image) {
                $nombre = time() . $image->getClientOriginalName();
                $ruta = public_path() . '/image';
                $image->move($ruta, $nombre);
                $urls[]['url'] = '/image/' . $nombre;
            }

            $product->images()->createMany($urls);
        }
    }
    public function status()
    {
        switch ($this->status) {
            case 'ACTIVE':
                return 'Activo';
            case 'DEACTIVATED':
                return 'Desactivado';
        }
    }

    static function get_active_products(){
        return self::where('status','ACTIVE');
    }
}
