<?php

namespace App\Repositories;

use Illuminate\Validation\ValidationException;

class AbstractRepositories
{
    public function raise422(array $messages = [])
    {
        throw ValidationException::withMessages($messages);
    }
}
