<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Throwable;

class SubjectsController extends Controller
{
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
