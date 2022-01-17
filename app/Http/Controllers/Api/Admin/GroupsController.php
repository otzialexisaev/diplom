<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;

class GroupsController extends Controller
{
    public function index()
    {
        return response()->json(Group::all());
    }
}
