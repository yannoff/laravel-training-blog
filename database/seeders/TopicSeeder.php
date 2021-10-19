<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $labels = ['Laravel', 'Symfony', 'PHP', 'Linux'];
        foreach ($labels as $label) {
            DB::table('topics')->insert([
                'label' => $label,
                'slug' => Str::slug($label),
            ]);
        }

    }
}
