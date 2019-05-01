<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
          'category_id' => 1,
        'title' => $faker->word,
        'body' => $faker->text,
        'size' => $faker->word,
        'count' => $faker->randomNumber,
        'status' => $faker->word,
        'slug' => $faker->word,
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'image_2' => $faker->imageUrl($width = 640, $height = 480),
        'image_3' => $faker->imageUrl($width = 640, $height = 480),
        'image_4' => $faker->imageUrl($width = 640, $height = 480),
        'price' => $faker->randomDigit,
    ];
});
