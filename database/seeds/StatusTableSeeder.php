<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = factory(Status::class)->times(500)->make()->each(function ($status) {
            $status->user_id = \App\Models\User::all()->random()->id;
        });

        Status::insert($statuses->toArray());
    }
}
