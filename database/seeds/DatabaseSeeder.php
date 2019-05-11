<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //nhập liệu mẫu cho bảng users
        DB::table('users')->insert([
        	['id'=>'1001', 'name'=>'Phan Thị Hiền', 'email'=>'hienphan18112015@gmail.com', 'password'=>'123456', 'isadmin'=>1],
        	['id'=>'1002', 'name'=>'Phan Thị Hà', 'email'=>'haphan@gmail.com', 'password'=>'111111', 'isadmin'=>0]
        ]);


        //nhập liệu mẫu cho bảng suppliers
        DB::table('suppliers')->insert([
        	['name'=>'FPT', 'address'=>'151 Hùng Vương, TP. Đà Nẵng', 'phonenum'=>'0971455395'],
        	['name'=>'Điện Máy Xanh', 'address'=>'169 Phan Châu Trinh, TP. Đà Nẵng', 'phonenum'=>'0379456011']
        ]);


        //Bảng phiếu bảo hành
    }
}
