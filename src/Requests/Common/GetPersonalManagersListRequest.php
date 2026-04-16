<?php

namespace GetCourse\Api\Requests\Common;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetPersonalManagersListRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/common/get-personal-managers';
    }
}