<?php

namespace GetCourse\Api\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use GetCourse\Api\Requests\Webhook\SetUriRequest;

class WebhookResource extends BaseResource
{
    public function setUri(string $uri, int $eventObjectId, int $eventId): Response
    {
        return $this->connector->send(new SetUriRequest($uri, $eventObjectId, $eventId));
    }
}