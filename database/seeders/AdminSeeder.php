<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Str;

class AdminSeeder extends Seeder{
    public function run(){
        $admin = new Admin();
        $admin->name = 'Mohammed Obaid';
        $admin->email = 'admin@admin.com';
        $admin->mobile_no = '0594034429';
        $admin->email_verified_at = now();
        $admin->password = Hash::make('12345678'); // password
        $admin->save();
    }
}