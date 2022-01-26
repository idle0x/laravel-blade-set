<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Carbon;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::all(['id']);
        $title = $this->faker->sentence();
        $slug = str_replace(' ', '-', strtolower($title));
        $slug = substr($slug, 0, strlen($slug) - 1);
        return [
            "title" => $title,
            "slug" => $slug,
            "content" => $this->faker->randomHtml(),
            "user_id" => $users->random(1)[0]->id,
            "posted_at" => Carbon::today()->subDays(rand(0,365)),
        ];
    }
}
