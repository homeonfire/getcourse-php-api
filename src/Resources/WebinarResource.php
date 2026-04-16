<?php

namespace GetCourse\Api\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use GetCourse\Api\Requests\Webinar\GetAllWebinarsRequest;
use GetCourse\Api\Requests\Webinar\GetWebinarsByIdsRequest;
use GetCourse\Api\Requests\Webinar\AddCommentWebinarRequest;
use GetCourse\Api\Requests\Webinar\ModerateWebinarCommentRequest;
use GetCourse\Api\Requests\Webinar\ModerateWebinarUserRequest;

class WebinarResource extends BaseResource
{
    public function getAll(): Response
    {
        return $this->connector->send(new GetAllWebinarsRequest());
    }

    public function getByIds(array $ids): Response
    {
        return $this->connector->send(new GetWebinarsByIdsRequest($ids));
    }

    public function addComment(int $moderatorId, int $webinarId, string $text, array $optionalParams = []): Response
    {
        return $this->connector->send(new AddCommentWebinarRequest($moderatorId, $webinarId, $text, $optionalParams));
    }

    public function moderateComment(int $webinarId, int $commentId, string $action, ?int $moderatorId = null): Response
    {
        return $this->connector->send(new ModerateWebinarCommentRequest($webinarId, $commentId, $action, $moderatorId));
    }

    public function moderateUser(int $webinarId, int $userId, int $userType, string $action, ?int $moderatorId = null, ?int $webinarLaunchNumber = null): Response
    {
        return $this->connector->send(new ModerateWebinarUserRequest($webinarId, $userId, $userType, $action, $moderatorId, $webinarLaunchNumber));
    }
}