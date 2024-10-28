<?php

declare(strict_types=1);

namespace App\Services\TicketsGate;

use App\Services\TicketsGate\Dto\ShowDto;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class Show implements ShowInterface
{
    public function __construct(
        public readonly string $url,
        public readonly string $authToken

    )
    {

    }

    ///public function shows(): ShowDto

    /**
     * @throws ConnectionException
     */
    public function shows(): Collection
    {
        $body =[];
        $response = Http::retry(3,100)
            ->withToken($this->authToken)
            ->get($this->url.'/shows');

        if ($response->ok()) {
            $decodeBody = json_decode($response->body(), true);
            $body = $decodeBody['response'] ?? $decodeBody;
        }

        $collection = collect($body);
        //$collection = $collection->map(fn ($item) => new ShowDto((int) $item['id'], $item['name']));
        return $collection->map(fn ($item) => new ShowDto((int) $item['id'], $item['name']));

        //dd($collection);

       // return $collection;

        // Преобразуем массив в коллекцию объектов ShowDto
//        return collect($body['response'])->map(function ($show) {
//            return new ShowDto(
//                $show['id'],
//                $show['name']
//            );
//        });
//        return collect($body);


        //decode json array from endpoint
        //return collect(json_decode($response->body(), true));
    }
}
