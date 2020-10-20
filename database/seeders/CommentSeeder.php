<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() === 0) {
            return;
        }

        $faker = Faker::create('ja_JP');
        $userIdList = User::pluck('id')->toArray();

        $comments = [];
        for ($i = 0; $i < 100; $i++) {
            $comments[] = [
                'user_id' => $faker->randomElement($userIdList),
                'body' => $faker->realText,
            ];
        }

        Comment::insert($comments);
    }
}
