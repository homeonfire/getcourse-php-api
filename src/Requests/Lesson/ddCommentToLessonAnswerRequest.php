<?php

namespace GetCourse\Api\Requests\Lesson;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class AddCommentToLessonAnswerRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/lesson/add-comment-to-lesson-answer';
    }

    public function __construct(
        protected int $lessonAnswerId,
        protected string $text,
        protected int $userId
    ) {}

    protected function defaultBody(): array
    {
        return [
            'lessonAnswerId' => $this->lessonAnswerId,
            'text' => $this->text,
            'userId' => $this->userId,
        ];
    }
}