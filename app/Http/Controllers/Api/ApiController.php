<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Group;

class ApiController extends Controller
{
    public function groups()
    {
        return response()->json(Group::all());
    }
}
