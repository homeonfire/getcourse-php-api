<?php

namespace GetCourse\Api\Requests\User;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class SetPersonalManagerRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/user/set-personal-manager';
    }

    public function __construct(
        protected ?int $managerId = null,
        protected ?int $userId = null,
        protected ?string $email = null
    ) {}

    protected function defaultBody(): array
    {
        $body = array_filter([
            'userId' => $this->userId,
            'email' => $this->email,
        ]);
        
        // Оставляем managerId даже если он null (чтобы можно было удалить менеджера)
        $body['managerId'] = $this->managerId;
        
        return $body;
    }
}