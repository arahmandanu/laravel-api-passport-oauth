<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\AbstractRepositories;

class Find extends AbstractRepositories
{
    private static $id;

    public function __construct($id, public bool $withRole = false)
    {
        self::$id = $id;
    }

    public function call()
    {
        return User::when($this->withRole, function ($query, $withRole) {
            $query->with('roles');
        })
            ->findOrFail(self::$id);
    }
}
