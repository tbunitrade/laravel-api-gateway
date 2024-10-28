<?php

namespace app\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Services\TicketsGate\Dto\EventItemDto;
use App\Services\TicketsGate\EventItemInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class EventItemController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,int $eventId, EventItemInterface $eventItem): JsonResponse
    {
        //
        try {
            $collection = $eventItem->getPlaces($eventId);

            return response()->json($collection->map(
                fn (EventItemDto $eventItemDto) => [
                    'id' => $eventItemDto->id,
                    'x' => $eventItemDto->x,
                    'y' => $eventItemDto->y,
                    'width' => $eventItemDto->width,
                    'height' => $eventItemDto->height,
                    'is_available' => $eventItemDto->isAvailable,
                ]
            ));

        } catch ( \Throwable $exception ) {
            Log::error("EventItem controller exception" . $exception->getMessage(), $exception->getTrace());

            return response()->json(['message'=> $exception->getMessage()], 500);
        }
    }
}
