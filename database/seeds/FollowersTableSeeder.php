<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #获取第一个用户ID
        $first_id = User::first()->id;

        #获取除第一个用户的其他用户
        $followers = User::all()->slice($first_id);
        $follower_ids = $followers->pluck('id')->toArray();

        #第一个用户关注其他所有用户
        User::find($first_id)->follow($follower_ids);

        #反关注第一个用户
        foreach ($followers as $follower) {
            $follower->follow($first_id);
        }

    }
}
