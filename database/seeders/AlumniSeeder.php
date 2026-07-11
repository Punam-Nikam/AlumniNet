<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumni;
use Illuminate\Support\Facades\Hash;

class AlumniSeeder extends Seeder
{
    public function run(): void
    {
        $alumniData = [
            ['name'=>'Punam Nikam','email'=>'punam@alumninet.com','password'=>Hash::make('password123'),'branch'=>'Computer Science','batch'=>'2020','company'=>'Google','role'=>'Software Engineer','status'=>'approved','is_admin'=>false],
            ['name'=>'Monica wankhede','email'=>'monica@alumninet.com','password'=>Hash::make('password123'),'branch'=>'Electronics','batch'=>'2021','company'=>'Microsoft','role'=>'Product Manager','status'=>'approved','is_admin'=>false],
            ['name'=>'Ashwini kulkarni','email'=>'ash@alumninet.com','password'=>Hash::make('password123'),'branch'=>'Mechanical','batch'=>'2019','company'=>'Tesla','role'=>'Design Engineer','status'=>'approved','is_admin'=>false],
            ['name'=>'Riddhi Daspute','email'=>'rid@alumninet.com','password'=>Hash::make('password123'),'branch'=>'Civil','batch'=>'2022','company'=>'L&T','role'=>'Site Engineer','status'=>'approved','is_admin'=>false],
            ['name'=>'Nishad shaikh','email'=>'nishu@alumninet.com','password'=>Hash::make('password123'),'branch'=>'Computer Science','batch'=>'2021','company'=>'Amazon','role'=>'Backend Engineer','status'=>'approved','is_admin'=>false],
            ['name'=>'Mayuri Pawar','email'=>'mayuri@alumninet.com','password'=>Hash::make('password123'),'branch'=>'IT','batch'=>'2020','company'=>'Infosys','role'=>'Tech Lead','status'=>'approved','is_admin'=>false],
        ];

        foreach ($alumniData as $data) {
            Alumni::firstOrCreate(['email' => $data['email']], $data);
        }
    }
}