<?php
namespace App\Repositories\User;

use App\Models\User;

class Where{
    public string $limit;
    public string $offset;

    public function __construct(string $limit = '10', string $offset = '0')
    {
        $this->limit = $limit;
        $this->offset = $offset;
    }

    public function call()
    {
        dd($this->limit, $this->offset);
    }
}
