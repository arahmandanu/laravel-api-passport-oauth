<?php

namespace App\Repositories\User;

use App\Models\Role;
use App\Models\User;
use App\Repositories\AbstractRepositories;

class Create extends AbstractRepositories
{
    public function __construct(public string $name, public string $email, public string $role, public string $password)
    {
    }

    public function call()
    {
        $role = $this->checkRole($this->role);
        if ($role === null) {
            return $this->raise422(['role' => 'Role not found!']);
        }

        $newUser = new User;
        $newUser->name = $this->name;
        $newUser->email = $this->email;
        $newUser->password = bcrypt($this->password);

        if ($newUser->save()) {
            $newUser->assignRole($this->role);

            return $newUser->refresh();
        } else {
            return $this->raise422(['failed to create new User']);
        }
    }

    private function checkRole($role)
    {
        $result = Role::where('name', '=', $role)->first();

        return $result;
    }
}
