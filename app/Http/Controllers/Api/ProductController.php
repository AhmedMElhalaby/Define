<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Product\IndexRequest;
use App\Http\Requests\Api\Product\ReviewRequest;
use App\Http\Requests\Api\Product\ShowRequest;
use App\Http\Requests\Api\Product\ToggleFavouriteRequest;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * @param IndexRequest $request
     * @return JsonResponse
     */
    public function index(IndexRequest $request): JsonResponse
    {
        return $request->persist();
    }
    /**
     * @param ShowRequest $request
     * @return JsonResponse
     */
    public function show(ShowRequest $request): JsonResponse
    {
        return $request->persist();
    }
    /**
     * @param ReviewRequest $request
     * @return JsonResponse
     */
    public function review(ReviewRequest $request): JsonResponse
    {
        return $request->persist();
    }
    /**
     * @param ToggleFavouriteRequest $request
     * @return JsonResponse
     */
    public function toggle_favourite(ToggleFavouriteRequest $request): JsonResponse
    {
        return $request->persist();
    }
}
