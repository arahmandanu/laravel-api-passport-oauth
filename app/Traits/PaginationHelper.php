<?php

namespace App\Traits;

trait PaginationHelper
{
    public function FormatQuery($request): array
    {
        $data = [
            'limit' => '10',
            'page' => '1',
            'query' => '',
        ];
        $data = array_merge($data, $request);

        return $data;
    }
}
