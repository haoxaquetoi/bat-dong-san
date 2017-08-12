<?php

use Illuminate\Database\Seeder;

class FeedbackTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('feedback')->insert([
            'id' => '1',
            'name' => 'Nội dung khác',
            'order' => 1,
            'status' => 1,
            'deleted' => 0,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

}
