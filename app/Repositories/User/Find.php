<?php

namespace App\Repositories\User;

use App\Models\User;

class Find
{
    private static $id;

    public function __construct($id)
    {
        self::$id = $id;
    }

    public function call()
    {
        return User::findOrFail(self::$id);
    }
}
