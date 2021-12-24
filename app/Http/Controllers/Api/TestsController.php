<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Test;

class TestsController extends Controller
{
    public function store()
    {
        $data = request()->all();
        $model = new Test();
        $model->group_id = $data->id;
        $model->save();
        var_dump($data);
//        die();
        return response()->json('asf');
    }
}
