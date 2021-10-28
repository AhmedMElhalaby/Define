<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Location\IndexRequest;
use App\Http\Requests\Api\Location\ShowRequest;
use App\Http\Requests\Api\Location\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserLocationController extends Controller
{
    public function index(IndexRequest $request): JsonResponse
    {
        return $request->run();
    }
    public function show(ShowRequest $request): JsonResponse
    {
        return $request->run();
    }

    public function store(StoreRequest $request)
    {
        return $request->run();
    }

}
