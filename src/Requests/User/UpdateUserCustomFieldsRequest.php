<?php

namespace GetCourse\Api\Requests\User;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class UpdateUserCustomFieldsRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/user/update-custom-fields';
    }

    public function __construct(
        protected array $customFields,
        protected ?int $userId = null,
        protected ?string $email = null
    ) {}

    protected function defaultBody(): array
    {
        return array_filter([
            'userId' => $this->userId,
            'email' => $this->email,
            'customFields' => $this->customFields,
        ]);
    }
}