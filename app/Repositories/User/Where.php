<?php

namespace App\Repositories\User;

use App\Models\User;

class Where
{
    public function __construct(public string $limit = '10', public string $page = '1')
    {
    }

    public function call()
    {
        return User::paginate($this->limit);
    }
}
