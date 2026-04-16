<?php

namespace GetCourse\Api\Requests\Deal;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class UpdateDealFieldsRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/deal/update-fields';
    }

    public function __construct(
        protected int $dealId,
        protected array $fields = []
    ) {}

    protected function defaultBody(): array
    {
        return array_merge(['dealId' => $this->dealId], $this->fields);
    }
}