<?php

namespace GetCourse\Api\Requests\User;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetBalanceRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user/get-balance';
    }

    public function __construct(
        protected ?int $userId = null,
        protected ?string $email = null,
        protected string $type = 'virtual'
    ) {}

    protected function defaultQuery(): array
    {
        return array_filter([
            'userId' => $this->userId,
            'email' => $this->email,
            'type' => $this->type,
        ]);
    }
}