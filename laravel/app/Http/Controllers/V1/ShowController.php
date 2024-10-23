<?php
declare(strict_types=1);

namespace app\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        // Business logic
        // add Service + Interface for logic with external API
        // add API resources
        return response()->json(['test'=> 'ok']);
    }
}
