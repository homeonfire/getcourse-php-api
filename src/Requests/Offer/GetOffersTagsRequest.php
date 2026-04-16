<?php

namespace GetCourse\Api\Requests\Offer;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetOffersTagsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/offer/get-offers-tags';
    }

    public function __construct(
        protected ?int $limit = null,
        protected ?int $offset = null
    ) {}

    protected function defaultQuery(): array
    {
        return array_filter([
            'limit' => $this->limit,
            'offset' => $this->offset,
        ]);
    }
}