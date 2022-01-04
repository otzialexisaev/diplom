<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Test;

class TestsController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Test::with('group')->get(['id', 'title', 'group_id']));
    }

    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Test::with('group')->where('id', $id)->first());
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

    public function update(int $id)
    {
        $data = request()->all();
        $model = Test::find($id);
        $model->group_id = $data['group_id'];
        $model->title = $data['title'];
        $model->questions = json_encode($data['questions']);
        $model->saveOrFail();
        return response()->json($model);
    }
}
