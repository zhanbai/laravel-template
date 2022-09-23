<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\Api\ImageRequest;
use Illuminate\Support\Str;

class ImagesController extends Controller
{
    public function store(ImageRequest $request, ImageUploadHandler $uploader)
    {
        $user = $request->user();

        $size = $request->type == 'avatar' ? 400 : 720;
        $result = $uploader->save($request->image, Str::plural($request->type), $user->id, $size);

        return success($result);
    }
}
