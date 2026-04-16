<?php

namespace GetCourse\Api\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use GetCourse\Api\Requests\Lesson\GetLessonAnswersRequest;
use GetCourse\Api\Requests\Lesson\AddCommentToLessonAnswerRequest;
use GetCourse\Api\Requests\Lesson\ChangeStatusAnswerRequest;

class LessonResource extends BaseResource
{
    public function getAnswers(int $lessonId): Response
    {
        return $this->connector->send(new GetLessonAnswersRequest($lessonId));
    }

    public function addComment(int $lessonAnswerId, string $text, int $userId): Response
    {
        return $this->connector->send(new AddCommentToLessonAnswerRequest($lessonAnswerId, $text, $userId));
    }

    public function changeStatus(int $lessonAnswerId, string $status): Response
    {
        return $this->connector->send(new ChangeStatusAnswerRequest($lessonAnswerId, $status));
    }
}