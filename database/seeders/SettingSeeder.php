<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([[
            'kode' => "P001",
            'label' => 'Nama Aplikasi',
            'value' => 'Vibesroom',
            'type' => 'text',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ], [
            'kode' => "P002",
            'label' => 'Tentang Kami',
            'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
            'type' => 'text',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],[
            'kode' => "P003",
            'label' => 'Tentang Kami Photo',
            'value' => 'img/category_1.png',
            'type' => 'file',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],[
            'kode' => "P004",
            'label' => 'Alamat Kami',
            'value' => 'Jl. Gg. Mas Cilik No.45, Brubahan, Purwanegara, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53116',
            'type' => 'text',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],[
            'kode' => "P005",
            'label' => 'Email',
            'value' => 'iniemail@mail.com',
            'type' => 'text',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],[
            'kode' => "P006",
            'label' => 'Phone',
            'value' => '0821-2299-33340',
            'type' => 'text',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],[
            'kode' => "P007",
            'label' => 'Facebook links',
            'value' => 'https://facebook.com',
            'type' => 'text',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],[
            'kode' => "P008",
            'label' => 'Instagram links',
            'value' => 'https://facebook.com',
            'type' => 'text',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],[
            'kode' => "P009",
            'label' => 'Twitter links',
            'value' => 'https://twitter.com',
            'type' => 'text',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]]);
    }
}
