<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call("NewsTableSeeder");
    }
}

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('product')->insert([
            array('name'=>'Quan Da Banh', 'price' => 50000, 'cate_id' => 2),
            array('name'=>'Quan Tennis', 'price' => 55000, 'cate_id' => 2),
            array('name'=>'Quan Vo Thuat', 'price' => 60000, 'cate_id' => 2),
            array('name'=>'Quan Cau Long', 'price' => 50000, 'cate_id' => 2)
        ]);
    }
}

class CategoryNewTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('category_new')->insert([
            ['name'=>'The Gioi'],
            ['name'=>'The Thao'],
            ['name'=>'Am Nhac'],
        ]);
    }
}

class NewsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('news')->insert([
            array('title'=>'Day la title 1', 'intro' => '1', 'cate_id' => 1),
            array('title'=>'Day la title 2', 'intro' => '2', 'cate_id' => 1),
            array('title'=>'Day la title 3', 'intro' => '3', 'cate_id' => 1),
            array('title'=>'Day la title 4', 'intro' => '4', 'cate_id' => 1)
        ]);
    }
}