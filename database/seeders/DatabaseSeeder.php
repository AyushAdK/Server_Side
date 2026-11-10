<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a known test user
        User::factory()->create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@example.com',
        ]);

        // Create 10 additional users
        User::factory(10)->create();

        // Create some tags
        $tags = collect(['Laravel', 'PHP', 'JavaScript', 'Vue.js', 'React', 'CSS', 'MySQL', 'API', 'Remote', 'Full-Time'])
            ->map(fn ($name) => Tag::create(['name' => $name]));

        // Create 20 job listings (each auto-creates an Employer via factory)
        Job::factory(20)->create()->each(function ($job) use ($tags) {
            // Attach 1-3 random tags to each job
            $job->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
