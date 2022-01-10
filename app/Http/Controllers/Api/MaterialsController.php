<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Material;

class MaterialsController extends Controller
{
    public function downloadMaterial(int $id)
    {
        $material = Material::where('id', $id)->get()->first();
        return response()->download(public_path('storage/' . $material->path), $material->title);
    }
}
