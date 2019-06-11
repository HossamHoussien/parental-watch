<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\ParentUser;
use Faker\Generator as Faker;

$factory->define(ParentUser::class, function (Faker $faker) {
    return [
        'username' => 'parent',
        'name' => $faker->name,
        'about' => $faker->realText(),
        'avatar' => $faker->imageUrl(),
        'address' => $faker->address,
        'city' => $faker->city,

        'phone' => $faker->phoneNumber,
        'gender'  => $faker->randomElement(['m', 'f']),
        'age' => $faker->numberBetween(18, 99),
        'bank_account' => $faker->bankAccountNumber,
        'ssn' => $faker->realText(50),
        'noKids' => $faker->numberBetween(1, 10),
        'email' =>  $faker->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});