<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $faker = Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));

        $order_status = array(
            'Pending',
            'Shipping',
            'Arrived',
            'Done',
        );


        

        for($i = 1; $i < 10; $i++) {
            App\User::create([
                'name' => $faker->userName,
                'email' => $faker->email,
                'password' => Hash::make('password'),
                'address_id' => $i,
            ]);
            
            App\Address::create([
                'user_id' => $i,
                'country' => $faker->country,
                'city' => $faker->city,
                'street' => $faker->address,
                'details' => $faker->address,
            ]);


            $order = mt_rand(1590000000,1599330000);
            $ship = mt_rand(1590000000,1599330000);
            $order = date("Y-m-d H:i:s",$order);
            $ship = date("Y-m-d H:i:s",$ship);
            App\Order::create([
                'user_id' => $i,
                'order_status' => $order_status[array_rand($order_status)],
                'order_date' => $order,
                'shipping_date' => $ship,
            ]);


            if(($i + 1) % 2 == 0) {
                DB::table('product_user')->insert([
                    'user_id' => $i+1,
                    'product_id' => $i+1,
                    'quantity' => rand(1,4),
                ]);
                DB::table('product_user')->insert([
                    'user_id' => $i+1,
                    'product_id' => $i+2,
                    'quantity' => rand(1,4),
                ]);
                DB::table('product_user')->insert([
                    'user_id' => $i+1,
                    'product_id' => $i+3,
                    'quantity' => rand(1,4),
                ]);
            }
        }

        
        for($i = 1; $i < 20; $i++) {
            App\Product::create([
                'product_name' => $faker->productName,
                'category' => $faker->department,
                'product_price' => $faker->randomNumber($nbDigits = 3).'.'.$faker->randomNumber($nbDigits = 2),
                'in_stock' => $faker->randomNumber($nbDigits = 3),
            ]);
            
            $order = mt_rand(1590000000,1599330000);
            $ship = mt_rand(1590000000,1599330000);
            $order = date("Y-m-d H:i:s",$order);
            $ship = date("Y-m-d H:i:s",$ship);
            App\Order::create([
                'user_id' => $i,
                'order_status' => $order_status[array_rand($order_status)],
                'order_date' => $order,
                'shipping_date' => $ship,
            ]);
        }

        for($i = 1; $i < 20; $i++) {
            $order = mt_rand(1590000000,1599330000);
            $ship = mt_rand(1590000000,1599330000);
            $order = date("Y-m-d H:i:s",$order);
            $ship = date("Y-m-d H:i:s",$ship);
            App\Order::create([
                'user_id' => rand(1,10),
                'order_status' => $order_status[array_rand($order_status)],
                'order_date' => $order,
                'shipping_date' => $ship,
            ]);
        }



    }
}
