<?php

namespace GetCourse\Api\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use GetCourse\Api\Requests\Dialog\GetDialogHistoryRequest;
use GetCourse\Api\Requests\Dialog\AddCommentToDialogRequest;
use GetCourse\Api\Requests\Dialog\ChangeDepartmentRequest;
use GetCourse\Api\Requests\Dialog\CloseDialogRequest;

class DialogResource extends BaseResource
{
    public function getHistory(int $dialogId, int $limit = 100): Response
    {
        return $this->connector->send(new GetDialogHistoryRequest($dialogId, $limit));
    }

    public function addComment(int $dialogId, string $commentText, array $transport, int $userId): Response
    {
        return $this->connector->send(new AddCommentToDialogRequest($dialogId, $commentText, $transport, $userId));
    }

    public function changeDepartment(int $dialogId, int $newDepartmentId): Response
    {
        return $this->connector->send(new ChangeDepartmentRequest($dialogId, $newDepartmentId));
    }

    public function close(int $dialogId): Response
    {
        return $this->connector->send(new CloseDialogRequest($dialogId));
    }
}