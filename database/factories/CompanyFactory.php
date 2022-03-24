<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;
        $slug = Str::slug($name);
        return [
            'user_id' => User::factory(),
            'name' => $name,
            'slug' => $slug,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'website' => $this->faker->domainName,
            'logo' => 'logo.jpg', // logo
            'cover_photo' => 'cover.jpg', // cover
            'slogan' => 'learn while you earn and grow',
            'description' => $this->faker->paragraph(rand(2,10)),
        ];
    }
}
