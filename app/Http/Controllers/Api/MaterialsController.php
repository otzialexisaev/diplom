<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialRequest;
use App\Http\Resources\MaterialResource;
use App\Models\Material;
use Throwable;

class MaterialsController extends Controller
{
    /**
     * @throws Throwable
     */
    public function store(MaterialRequest $request)
    {
        $model = new Material();
        $model->title = $request->get('title');
        $model->path = $request->file('file')->store('materials');
        if ($model->path === false) {
            return response()->json()->setStatusCode(500, "Couldn't save file");
        }
        $model->saveOrFail();
        return new MaterialResource($model);
    }
}
