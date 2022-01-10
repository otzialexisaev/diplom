<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialRequest;
use App\Http\Resources\MaterialResource;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;
use Throwable;

class MaterialsController extends Controller
{
    public function index()
    {
        return response()->json(Material::with('subjects')->get());
    }

    /**
     * @throws Throwable
     */
    public function store(MaterialRequest $request)
    {
        $model = new Material();;
        $model->title = $request->get('title') . '.' . $request->file('file')->extension();
        $path = Storage::disk('public')->putFile('materials', $request->file('file'));
        if ($path === false) {
            return response()->json()->setStatusCode(500, "Couldn't save file");
        }
        $model->path = $path;
        $model->saveOrFail();
        $model->subjects()->attach($request->get('subject_id'));
        return new MaterialResource($model);
    }
}
