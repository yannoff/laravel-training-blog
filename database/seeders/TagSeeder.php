<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'php', 'mysql', 'pgsql', 'redis', 'git', 'docker', 'docker-compose', 'symfony', 'laravel',
            'linux', 'bash', 'awk', 'github', 'gitlab', 'Unix', 'BSD', 'composer', 'offenbach', 'YAML', 'JSON',
        ];
        foreach ($tags as $tag) {
            DB::table('tags')->insert(['label' => $tag, 'slug' => Str::slug($tag)]);
        }
    }
}
