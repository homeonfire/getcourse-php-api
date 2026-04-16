<?php

namespace GetCourse\Api\Requests\User;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetUserLessonAnswersRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user/get-lesson-answers';
    }

    public function __construct(
        protected ?int $userId = null,
        protected ?string $email = null
    ) {}

    protected function defaultQuery(): array
    {
        return array_filter([
            'userId' => $this->userId,
            'email' => $this->email,
        ]);
    }
}