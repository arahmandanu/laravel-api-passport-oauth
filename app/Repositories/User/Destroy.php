<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\AbstractRepositories;

class Destroy extends AbstractRepositories
{
    public function __construct(public string $id)
    {
    }

    public function call()
    {
        $user = User::findOrFail($this->id);
        if ($user->delete()) {
            return null;
        } else {
            return abort(422, 'failed delete data');
        }
    }
}
