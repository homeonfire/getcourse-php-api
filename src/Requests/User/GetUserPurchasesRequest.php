<?php

namespace GetCourse\Api\Requests\User;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetUserPurchasesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user/get-purchases';
    }

    public function __construct(
        protected ?int $userId = null,
        protected ?string $email = null,
        protected ?string $productId = null
    ) {}

    protected function defaultQuery(): array
    {
        return array_filter([
            'userId' => $this->userId,
            'email' => $this->email,
            'productId' => $this->productId,
        ]);
    }
}