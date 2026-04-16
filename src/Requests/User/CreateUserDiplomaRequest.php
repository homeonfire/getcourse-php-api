<?php

namespace GetCourse\Api\Requests\User;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class CreateUserDiplomaRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/user/create-diploma';
    }

    public function __construct(
        protected int $templateId,
        protected ?int $userId = null,
        protected ?string $email = null,
        protected ?string $number = null,
        protected ?string $trainingName = null,
        protected ?string $userName = null,
        protected bool $allowDuplicates = false
    ) {}

    protected function defaultBody(): array
    {
        return array_filter([
            'userId' => $this->userId,
            'email' => $this->email,
            'templateId' => $this->templateId,
            'number' => $this->number,
            'trainingName' => $this->trainingName,
            'userName' => $this->userName,
            'allowDuplicates' => $this->allowDuplicates,
        ], fn($value) => $value !== null); // Чтобы false не отфильтровался
    }
}