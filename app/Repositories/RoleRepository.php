<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository {
    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function getByName($name){
        return $this->role->where('name',$name)->first();
    }
    
}