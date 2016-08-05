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
        $this->call("ProductTableSeeder");
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
