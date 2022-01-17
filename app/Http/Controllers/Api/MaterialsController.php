<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;

class MaterialsController extends Controller
{
    public function download(int $id): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        $material = Material::where('id', $id)->get()->first();
        return Storage::disk('public')->download($material->path, $material->title);
    }
}
