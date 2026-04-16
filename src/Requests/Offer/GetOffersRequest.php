<?php

namespace GetCourse\Api\Requests\Offer;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetOffersRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/offer/get-offers';
    }
}