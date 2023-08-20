<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\AbstractRepositories;

class Update extends AbstractRepositories
{
    public function __construct(public array $payload, public string $id)
    {
    }

    public function call()
    {
        $user = User::findOrFail($this->id);
        dd($user);
        dd($this->payload, $this->id);
    }
}
