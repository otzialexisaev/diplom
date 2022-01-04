<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Test;

class TestsController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Test::where('group_id', auth()->user()->group_id)->get(['id', 'title', 'group_id']));
    }

    public function getTest(int $id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Test::where('id', $id)->first());
    }
}
