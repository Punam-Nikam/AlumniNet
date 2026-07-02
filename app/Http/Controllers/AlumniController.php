<?php

namespace App\Http\Controllers;

class AlumniController extends Controller
{
    public function index()
    {
        // Dummy alumni data for now (real DB data comes in Task 4-7)
        //task 1 here
        $alumni = [
            [
                'name'    => 'Rahul Sharma',
                'branch'  => 'Computer Science',
                'batch'   => '2020',
                'company' => 'Google',
                'role'    => 'Software Engineer',
                'email'   => 'rahul@gmail.com',
            ],
            [
                'name'    => 'Priya Patel',
                'branch'  => 'Electronics',
                'batch'   => '2021',
                'company' => 'Microsoft',
                'role'    => 'Product Manager',
                'email'   => 'priya@gmail.com',
            ],
            [
                'name'    => 'Amit Verma',
                'branch'  => 'Mechanical',
                'batch'   => '2019',
                'company' => 'Tesla',
                'role'    => 'Design Engineer',
                'email'   => 'amit@gmail.com',
            ],
            [
                'name'    => 'Sara Khan',
                'branch'  => 'Civil',
                'batch'   => '2022',
                'company' => 'L&T',
                'role'    => 'Site Engineer',
                'email'   => 'sara@gmail.com',
            ],
        ];

        return view('alumni.index', compact('alumni'));
    }
}