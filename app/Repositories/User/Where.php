<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\AbstractRepositories;

class Where extends AbstractRepositories
{
    public function __construct(public ?string $query = '', public ?string $limit = '10', public ?string $page = '1')
    {
    }

    public function call()
    {
        return User::when($this->query, function ($record, $query) {
            return $record->where('name', 'like', "%{$query}%");
        })
            ->paginate($this->limit);
    }
}
