<?php

namespace GetCourse\Api\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use GetCourse\Api\Requests\Deal\GetDealFieldsRequest;
use GetCourse\Api\Requests\Deal\UpdateDealFieldsRequest;
use GetCourse\Api\Requests\Deal\AddDealPositionsRequest;
use GetCourse\Api\Requests\Deal\RemoveDealPositionsRequest;
use GetCourse\Api\Requests\Deal\AddCommentToDealRequest;
use GetCourse\Api\Requests\Deal\GetDealCommentsRequest;
use GetCourse\Api\Requests\Deal\GetDealCallsRequest;
use GetCourse\Api\Requests\Deal\GetDealCustomFieldsRequest;
use GetCourse\Api\Requests\Deal\GetCancelReasonsRequest;
use GetCourse\Api\Requests\Deal\GetDealsTagsRequest;

class DealResource extends BaseResource
{
    public function getFields(int $dealId): Response
    {
        return $this->connector->send(new GetDealFieldsRequest($dealId));
    }

    public function updateFields(int $dealId, array $fields = []): Response
    {
        return $this->connector->send(new UpdateDealFieldsRequest($dealId, $fields));
    }

    public function addPositions(int $dealId, array $positions): Response
    {
        return $this->connector->send(new AddDealPositionsRequest($dealId, $positions));
    }

    public function removePositions(int $dealId, array $positionIds): Response
    {
        return $this->connector->send(new RemoveDealPositionsRequest($dealId, $positionIds));
    }

    public function addComment(int $dealId, int $userId, string $text): Response
    {
        return $this->connector->send(new AddCommentToDealRequest($dealId, $userId, $text));
    }

    public function getComments(int $dealId): Response
    {
        return $this->connector->send(new GetDealCommentsRequest($dealId));
    }

    public function getCalls(int $dealId): Response
    {
        return $this->connector->send(new GetDealCallsRequest($dealId));
    }

    public function getCustomFields(int $dealId): Response
    {
        return $this->connector->send(new GetDealCustomFieldsRequest($dealId));
    }

    public function getCancelReasons(): Response
    {
        return $this->connector->send(new GetCancelReasonsRequest());
    }

    public function getDealsTags(?int $limit = null, ?int $offset = null): Response
    {
        return $this->connector->send(new GetDealsTagsRequest($limit, $offset));
    }
}