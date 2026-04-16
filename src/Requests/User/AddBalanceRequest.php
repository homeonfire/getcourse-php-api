<?php

namespace GetCourse\Api\Requests\User;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class AddBalanceRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/user/add-balance';
    }

    public function __construct(
        protected int $value,
        protected ?int $userId = null,
        protected ?string $email = null,
        protected string $type = 'virtual',
        protected string $comment = ''
    ) {}

    protected function defaultBody(): array
    {
        return array_filter([
            'userId' => $this->userId,
            'email' => $this->email,
            'value' => $this->value,
            'type' => $this->type,
            'comment' => $this->comment,
        ]);
    }
}