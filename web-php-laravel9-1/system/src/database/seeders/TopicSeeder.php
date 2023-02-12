<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Topic::factory()->count(50)->create();
        //
        // for($i = 10; $i <= 10; $i++){
        //     DB::table('topics')->insert([
        //         'name' => '名称：' . Str::random(10),
        //         'toc' => '内容:' . Str::random(100),
        //         'memo' => 'メモ:' . Str::random(20),
        //     ]);
    
        // }
  
        
    }
}
