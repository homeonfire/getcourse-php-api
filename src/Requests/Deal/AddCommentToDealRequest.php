<?php

namespace GetCourse\Api\Requests\Deal;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class AddCommentToDealRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/deal/add-comment';
    }

    public function __construct(
        protected int $dealId,
        protected int $userId,
        protected string $text
    ) {}

    protected function defaultBody(): array
    {
        return [
            'dealId' => $this->dealId,
            'userId' => $this->userId,
            'text' => $this->text,
        ];
    }
}