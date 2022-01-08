<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Solves;
use App\Models\Test;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Throwable;

class TestsController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Test::where('group_id', auth()->user()->group_id)->get(['id', 'title', 'group_id']));
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws Throwable
     */
    public function solve(int $id)
    {
        $model = new Solves();
        $model->test_id = $id;
        $model->user_id = auth()->user()->id;
        $model->data = json_encode(request()->get('answers'));
        $model->saveOrFail();
        return response()->json($model);
    }

    public function getTest(int $id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Test::where('id', $id)->first());
    }
}
