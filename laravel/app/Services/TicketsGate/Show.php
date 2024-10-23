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

//        $response = Http::withOptions([
//            'debug' => true, // Включаем детальные логи Guzzle
//        ])
//            ->retry(3, 100)
//            ->timeout(60)
//            ->withToken($this->authToken)
//            ->get($this->url.'/shows');
        $response = Http::retry(3,100)
            ->withToken($this->authToken)
            ->get($this->url.'/shows');

        $showsArray = json_decode($response->body(), true);


        // Преобразуем массив в коллекцию объектов ShowDto
        return collect($showsArray['response'])->map(function ($show) {
            return new ShowDto(
                $show['id'],
                $show['name']
            );
        });


        //decode json array from endpoint
        //return collect(json_decode($response->body(), true));
    }
}
