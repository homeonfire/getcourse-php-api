<?php

namespace GetCourse\Api\Requests\Deal;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetDealFieldsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/deal/get-fields';
    }

    public function __construct(
        protected int $dealId
    ) {}

    protected function defaultQuery(): array
    {
        return ['dealId' => $this->dealId];
    }
}