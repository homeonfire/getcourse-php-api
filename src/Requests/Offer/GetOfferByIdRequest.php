<?php

namespace GetCourse\Api\Requests\Offer;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetOfferByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/offer/get-offer-by-id';
    }

    public function __construct(
        protected int $offerId
    ) {}

    protected function defaultQuery(): array
    {
        return ['offerId' => $this->offerId];
    }
}