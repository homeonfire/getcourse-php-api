<?php

namespace GetCourse\Api\Requests\Lesson;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class ChangeStatusAnswerRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/lesson/change-status-answers';
    }

    public function __construct(
        protected int $lessonAnswerId,
        protected string $status
    ) {}

    protected function defaultBody(): array
    {
        return [
            'lessonAnswerId' => $this->lessonAnswerId,
            'status' => $this->status,
        ];
    }
}