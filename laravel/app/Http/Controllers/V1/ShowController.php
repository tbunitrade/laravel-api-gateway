<?php
declare(strict_types=1);

namespace app\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Services\TicketsGate\Dto\ShowDto;
use App\Services\TicketsGate\ShowInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

final class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ShowInterface $show ): JsonResponse
    {
        // Business logic
        // add Service + Interface for logic with external API
        // add API resources

        try {
            $collection = $show->shows();

            return response()->json($collection->map(
                fn (ShowDto $showDto) => [
                    'id' => $showDto->id,
                    'name' => $showDto->name
                ]
            ));

        } catch ( \Throwable $exception ) {
            Log::error("Show controller exception" . $exception->getMessage(), $exception->getTrace());

            return response()->json(['message'=> $exception->getMessage()], 500);
        }


        //return response()->json(['test'=> 'ok']);
    }
}
