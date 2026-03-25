<?php 

namespace App\Services;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TeacherService
{
    public function list()
    {
        return Teacher::with('user')->get();
    }

    public function create(array $data)
    {
        $user = User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            'role'=>'teacher',
        ]);

        return Teacher::create([
            'user_id'=>$user->id,
            'salary_amount'=>$data['salary_amount']
        ]);
    }
}