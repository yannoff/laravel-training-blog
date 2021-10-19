<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Yannoff',
            'email' => 'yannoff@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('toto'),
            'remember_token' => Str::random(10),
        ]);

        User::factory()
            ->count(10)
            ->has(
                Article::factory()
                    ->count(5)
                    ->sequence(fn ($seq) => [ 'topic_id' => Topic::all(['id'])->random() ])
            )
            ->create();
    }
}
