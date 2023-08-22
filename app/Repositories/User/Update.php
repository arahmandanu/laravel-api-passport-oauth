<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\AbstractRepositories;
use Illuminate\Support\Arr;

class Update extends AbstractRepositories
{
    public function __construct(public array $payload, public string $id)
    {
    }

    public function call()
    {
        $user = User::with('roles')->findOrFail($this->id);
        if ($user->update(Arr::except($this->payload, ['role']))) {
            if (Arr::exists($this->payload, 'role')) {
                foreach ($user->getRoleNames() as $role => $value) {
                    $user->removeRole($value);
                }

                $user->assignRole($this->payload['role']);
            }

            return $user->refresh();
        } else {
            return abort(422, 'Failed update user');
        }
    }
}
