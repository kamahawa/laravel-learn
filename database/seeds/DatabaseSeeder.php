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
        $this->call("ThanhVienTableSeeder");
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

class ImagesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('images')->insert([
            ['name'=>'hinh_quan_tennis_1.png', 'product_id' => 5],
            ['name'=>'hinh_quan_tennis_2.png', 'product_id' => 5],
            ['name'=>'hinh_quan_tennis_3.png', 'product_id' => 5],
            ['name'=>'hinh_quan_tennis_4.png', 'product_id' => 5],
            ['name'=>'hinh_quan_kaki_nam_1.png', 'product_id' => 8],
            ['name'=>'hinh_quan_kaki_nam_2.png', 'product_id' => 8],
            ['name'=>'hinh_quan_kaki_nam_3.png', 'product_id' => 8]
        ]);
    }
}

class ThanhVienTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('thanh_viens')->insert([
            ['user'=>'Teo', 'pass' => Hash::make(123456), 'level' => 1],
            ['user'=>'Ti', 'pass' => Hash::make(123456), 'level' => 2],
            ['user'=>'Tun', 'pass' => Hash::make(123456), 'level' => 2],
        ]);
    }
}