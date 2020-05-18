<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_category')->insert(
            [
                [
                    'article_id' => 1,
                    'article_category_id' => 1,
                ],
                [
                    'article_id' => 2,
                    'article_category_id' => 1,
                ],
                [
                    'article_id' => 2,
                    'article_category_id' => 3,
                ],
                [
                    'article_id' => 3,
                    'article_category_id' => 3,
                ]
            ]
        );
    }
}
