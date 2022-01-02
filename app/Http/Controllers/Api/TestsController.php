<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Test;

class TestsController extends Controller
{
    public function index()
    {
        return response()->json(Test::with('group')->get(['id', 'title', 'group_id']));
    }

    public function store()
    {
        $data = request()->all();
        $model = new Test();
        $model->group_id = $data['group_id'];
        $model->title = $data['title'];
        $model->questions = json_encode($data['questions']);
        $model->saveOrFail();
        return response()->json($model);
    }
}
