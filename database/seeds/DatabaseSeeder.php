<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //$this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BusinessTableSeeder::class);
        $this->call(PrinterTableSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(PaymentPlatformSeeder::class);


        factory(App\Tag::class,10)->create();
        factory(App\Category::class,10)->create();
        factory(App\SubCategory::class,50)->create();
        factory(App\Provider::class,10)->create();
        factory(App\Product::class,24)->create()->each(function($product){
            $product->images()->saveMany(factory(App\Image::class,4)->make());
        });
        //factory(App\Client::class,10)->create();
    }
}
