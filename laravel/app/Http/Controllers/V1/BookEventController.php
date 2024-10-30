<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookEventRequest;
use App\Services\TicketsGate\BookEventInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

final class BookEventController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(BookEventRequest $request, int $id, BookEventInterface $bookEvent): JsonResponse
    {

        //dd($request->validated());

        try {
            $bookEventDto =  $bookEvent->eventReserve($id, $request->validated('name'), $request->getPlaces());

            return response()->json($bookEventDto);
        } catch ( \Throwable $exception ) {
            Log::error("BookEvent controller exception" . $exception->getMessage(), $exception->getTrace());

            return response()->json(['message'=> $exception->getMessage()], 500);
        }
    }
}
