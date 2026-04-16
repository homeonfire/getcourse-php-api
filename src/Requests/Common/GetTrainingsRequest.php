<?php

namespace GetCourse\Api\Requests\Common;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetTrainingsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/common/get-trainings';
    }
}