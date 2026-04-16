<?php

namespace GetCourse\Api\Requests\Webinar;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAllWebinarsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/webinar/get-all-webinars';
    }
}