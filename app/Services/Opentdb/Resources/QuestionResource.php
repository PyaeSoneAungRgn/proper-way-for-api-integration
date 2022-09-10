<?php

namespace App\Services\Opentdb\Resources;

use App\Services\Opentdb\OpentdbService;
use Illuminate\Http\Client\Response;

class QuestionResource
{
    public function __construct(
        private readonly OpentdbService $service,
    ) {
    }

    public function list(?int $count = 3): Response
    {
        return $this->service->get(
            request: $this->service->buildRequest(),
            url: "/api.php?amount={$count}",
        );
    }
}
