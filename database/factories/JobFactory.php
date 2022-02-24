<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Job;
use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JobFactory extends Factory
{
   /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text;
        $slug = Str::slug($title);
        return [
            'user_id' => User::factory(),
            'company_id' => Company::factory(),
            'category_id' => rand(1, 5),
            'title' => $title,
            'slug' => $slug,
            'description' => $this->faker->paragraph(rand(2,10)),
            'roles' => $this->faker->text,
            'position' => $this->faker->jobTitle,
            'address' => $this->faker->address,
            'type' => 'fulltime',
            'status' => rand(0,1), // status pending or approved
            'last_date' => $this->faker->dateTimeBetween("-1 day" , now()), // last date the job was posted
        ];
    }
}
