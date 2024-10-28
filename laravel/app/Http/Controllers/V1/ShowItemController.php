<?php
declare(strict_types=1);

namespace app\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Services\TicketsGate\Dto\ShowDto;
use App\Services\TicketsGate\Dto\ShowEventDto;
use App\Services\TicketsGate\ShowEventInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShowItemController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, int $id, ShowEventInterface $showEvent)
    {
        //
        try {
            $collection = $showEvent->getEvents($id);

            return response()->json($collection->map(
                fn (ShowEventDto $showEventDto) => [
                    'id' => $showEventDto->id,
                    'showId' => $showEventDto->showId,
                    'date' => $showEventDto->date->format('Y-m-d H:i:s'),
                ]
            ));

        } catch ( \Throwable $exception ) {
            Log::error("Show item controller exception" . $exception->getMessage(), $exception->getTrace());

            return response()->json(['message'=> $exception->getMessage()], 500);
        }
    }
}
