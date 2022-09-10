<?php

namespace App\Services\Opentdb;

use App\Services\Concerns\BuildBaseRequest;
use App\Services\Concerns\CanSendGetRequest;
use App\Services\Concerns\CanSendPostRequest;
use App\Services\Opentdb\Resources\QuestionResource;

class OpentdbService
{
    use BuildBaseRequest;
    use CanSendGetRequest;
    use CanSendPostRequest;

    public function __construct(
        private readonly string $baseUrl,
        private readonly string $apiToken,
    ) {
    }

    public function question(): QuestionResource
    {
        return new QuestionResource(
            service: $this,
        );
    }
}
