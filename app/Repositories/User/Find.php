<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\AbstractRepositories;

class Find extends AbstractRepositories
{
    private static $id;

    public function __construct($id)
    {
        self::$id = $id;
    }

    public function call()
    {
        return User::with('roles')->findOrFail(self::$id);
    }
}
