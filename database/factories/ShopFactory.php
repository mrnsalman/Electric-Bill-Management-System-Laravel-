<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Shop::class, function (Faker $faker) {
    return [
        'shop_no'=> rand(1,10),
        'floor'=> '1',
        'shop_id'=> rand(1,10),
        'shop_name'=> $faker->company,
        'shop_owner'=> $faker->name,
        'owner_address'=> $faker->address,
        'owner_contact'=> $faker->phoneNumber,
        'image'=> 'shopOwner-images/avatar5.png',
        'created_at'=> $faker->dateTime,
        'updated_at'=> $faker->dateTime,

    ];
});
