<?php

namespace GetCourse\Api\Requests\Deal;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class AddDealPositionsRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/deal/add-positions';
    }

    public function __construct(
        protected int $dealId,
        protected array $positions
    ) {}

    protected function defaultBody(): array
    {
        return [
            'dealId' => $this->dealId,
            'positions' => $this->positions,
        ];
    }
}