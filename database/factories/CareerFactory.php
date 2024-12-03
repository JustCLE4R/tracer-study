<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Career>
 */
class CareerFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'user_id' => $this->faker->numberBetween(1, 50),
      'category' => $this->faker->numberBetween(1, 4),
      'position' => $this->faker->jobTitle(),
      'slug' => $this->faker->slug(),
      'company_name' => $this->faker->company(),
      'url' => $this->faker->url(),
      'description' => collect($this->faker->paragraphs(mt_rand(15,25)))
                      -> map(fn($p) => "<p>$p</p>")
                      -> join(''),
      'image' => 'https://picsum.photos/200/300?random=' . $this->faker->numberBetween(1, 1000),
      'excerpt' => $this->faker->paragraph(1),
      'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
    ];
  }
}
