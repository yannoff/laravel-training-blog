<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Article::all() as $article) {

            for ($i = 0; $i < 12; $i++) {
                DB::table('article_tag')
                    ->insert([
                        'article_id' => $article->id,
                        'tag_id' => Tag::all(['id'])->random()->id,
                    ])
                ;
            }
        }
    }
}
