<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository {

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll(){
        return $this->user->all();
    }

    public function getById($id){
        return $this->user->find($id);
    }

    public function create($data){
        return $this->user->create([
            "name" => $data['name'],
            "email" => $data['email'],
            "password" => $data['password'],
        ]);
    }

    public function update($data, $id){
        return $this->getById($id)->update([
            "name" => $data['name'],
            "email" => $data['email'],
            "password" => $data['password'],
        ]);
    }

    public function delete($id){
        return $this->getById($id)->delete();
    }

    public function resetPassword($id){
        $user = $this->user->find($id);
        $user->password = Hash::make($user->name);
        $user->save();
        return $user;
    }

}