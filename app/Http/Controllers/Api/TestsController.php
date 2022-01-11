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
        return response()->json(Test::where('group_id', auth()->user()->group_id)->with('subject')->get());
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws Throwable
     */
    public function solve(int $id): \Illuminate\Http\JsonResponse
    {
        $model = new Solves();
        $model->test_id = $id;
        $model->user_id = auth()->user()->id;
        $model->data = json_encode(request()->get('answers'));
        $model->saveOrFail();
        return response()->json($model);
    }

    public function solves(int $id)
    {
        $solve = Solves::where('id', $id)->where('user_id', auth()->user()->id)->with('test')->get()->last()->toArray();
        $data = [
            'title' => $solve['test']['title'],
            'questions' => []
        ];
        $solve['test']['questions'] = json_decode($solve['test']['questions'], true);
        $solve['data'] = json_decode($solve['data'], true);
        foreach ($solve['test']['questions'] as $index => $question) {
            if (is_array($question['data']['correct'])) {
                sort($question['data']['correct']);
            }
            $data['questions'][$index]['description'] = $question['data']['description'];
            $data['questions'][$index]['material_id'] = $question['data']['material_id'];
            $data['questions'][$index]['type'] = $question['type'];
            $data['questions'][$index]['items'] = $question['data']['items'];
            $data['questions'][$index]['correct'] = $question['data']['correct'];
            $data['questions'][$index]['answers'] = $solve['data'][$index];
        }
        return response()->json($data);
    }

    public function getTest(int $id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Test::where('id', $id)->first());
    }
}
