<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Traits\PaginationHelper;

class AbstractController extends Controller
{
    use PaginationHelper;
}
