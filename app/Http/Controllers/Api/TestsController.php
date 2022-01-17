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
    public function getAll(): \Illuminate\Http\JsonResponse
    {
        $tests = Test::where('group_id', auth()->user()->group_id)->with('subject')->get()->toArray();
        $testsIds = data_get($tests, '*.id');
        $solves = Solves::whereIn('test_id', $testsIds)->where('user_id', '=', auth()->user()->id)->get('test_id');
        $testsSolvesIds = data_get($solves, '*.test_id');
        foreach ($tests as &$test) {
            if (in_array($test['id'], $testsSolvesIds)) {
                $test['has_solves'] = true;
            } else {
                $test['has_solves'] = false;
            }
        }
        return response()->json($tests);
    }

    public function get(int $id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Test::where('id', $id)->first());
    }
}
