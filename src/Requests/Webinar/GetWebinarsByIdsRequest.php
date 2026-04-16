<?php

namespace GetCourse\Api\Requests\Webinar;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class GetWebinarsByIdsRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/webinar/get-webinars-by-ids';
    }

    public function __construct(protected array $ids) {}

    protected function defaultBody(): array
    {
        return ['ids' => $this->ids];
    }
}