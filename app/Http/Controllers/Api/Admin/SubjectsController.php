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
    public function getAll(): JsonResponse
    {
        return response()->json(Subject::where('user_id', '=', auth()->user()->id)->get());
    }
    /**
     * @throws Throwable
     */
    public function store()
    {
        $model = new Subject();
        $model->title = request()->get('title');
        $model->user_id = auth()->user()->id;
        $model->saveOrFail();
    }
}
