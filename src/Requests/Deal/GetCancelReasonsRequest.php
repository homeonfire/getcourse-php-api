<?php

namespace GetCourse\Api\Requests\Deal;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetCancelReasonsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/deal/get-cancel-reasons';
    }
}