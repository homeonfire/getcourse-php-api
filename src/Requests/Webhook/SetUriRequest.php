<?php

namespace GetCourse\Api\Requests\Webhook;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class SetUriRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/set-uri';
    }

    public function __construct(
        protected string $uri,
        protected int $eventObjectId,
        protected int $eventId
    ) {}

    protected function defaultBody(): array
    {
        return [
            'uri' => $this->uri,
            'event_object_id' => $this->eventObjectId,
            'event_id' => $this->eventId,
        ];
    }
}