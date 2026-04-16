<?php

namespace GetCourse\Api\Requests\User;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class RemoveGroupsRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/user/remove-groups';
    }

    public function __construct(
        protected array $groups,
        protected ?int $userId = null,
        protected ?string $email = null
    ) {}

    protected function defaultBody(): array
    {
        return array_filter([
            'userId' => $this->userId,
            'email' => $this->email,
            'groups' => $this->groups,
        ]);
    }
}