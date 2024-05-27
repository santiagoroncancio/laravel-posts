<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Exception;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function store(PostRequest $request)
    {
        try {
            $request->user()->posts()->create($request->all());
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        return back();
    }
}
