<?php

use App\Customer;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $gender = array('m', 'f', 'o');
        for($i=1;$i<=100;$i++){
            $customer = new Customer;
            $customer->name = $faker->name;
            $customer->email = $faker->email;
            $customer->gender = array_rand(array_flip($gender), 1);
            $customer->address = $faker->address;
            $customer->country = $faker->country;
            $customer->state = $faker->state;
            $customer->dob = $faker->date($format = 'Y-m-d', $max = '2005',$min = '1980');
            $customer->password = md5($faker->password);
            $customer->save();  // Insert data into DB
        }
    }
}
