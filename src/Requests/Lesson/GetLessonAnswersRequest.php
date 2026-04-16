<?php

namespace GetCourse\Api\Requests\Lesson;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetLessonAnswersRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/lesson/get-answers';
    }

    public function __construct(
        protected int $lessonId
    ) {}

    protected function defaultQuery(): array
    {
        return ['lessonId' => $this->lessonId];
    }
}