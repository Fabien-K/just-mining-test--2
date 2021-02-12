<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produit;
use Faker\Generator as Faker;

$factory->define(Produit::class, function (Faker $faker) {
    return [
        'nom' => $faker->text(15),
        'description' => $faker->text(50),
        'prix'=> $faker->numberBetween(1,100),
        'image'=> 'https://picsum.photos/150/100',
    ];
});
