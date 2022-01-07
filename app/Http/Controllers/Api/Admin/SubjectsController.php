<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\JsonResponse;
use Throwable;

class SubjectsController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Subject::all());
    }
    /**
     * @throws Throwable
     */
    public function store()
    {
        $model = new Subject();
        $model->title = request()->get('title');
        $model->saveOrFail();
    }
}
