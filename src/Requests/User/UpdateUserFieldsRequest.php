<?php

namespace GetCourse\Api\Requests\User;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class UpdateUserFieldsRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/user/update-fields';
    }

    public function __construct(
        protected array $fields,
        protected ?int $userId = null,
        protected ?string $email = null
    ) {}

    protected function defaultBody(): array
    {
        $base = array_filter([
            'userId' => $this->userId,
            'email' => $this->email,
        ]);
        
        return array_merge($base, $this->fields);
    }
}