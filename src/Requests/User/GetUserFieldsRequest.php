<?php

namespace GetCourse\Api\Requests\User;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetUserFieldsRequest extends Request
{
    // Метод запроса согласно схеме
    protected Method $method = Method::GET;

    public function __construct(
        protected ?int $userId = null,
        protected ?string $email = null
    ) {}

    // Эндпоинт из схемы
    public function resolveEndpoint(): string
    {
        return '/user/get-fields';
    }

    // Параметры запроса (Query string)
    protected function defaultQuery(): array
    {
        // array_filter удалит null-значения, если мы передали только email или только id
        return array_filter([
            'userId' => $this->userId,
            'email' => $this->email,
        ]);
    }
}