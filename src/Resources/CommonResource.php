<?php

namespace GetCourse\Api\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use GetCourse\Api\Requests\Common\GetGroupsRequest;
use GetCourse\Api\Requests\Common\GetPersonalManagersListRequest;
use GetCourse\Api\Requests\Common\GetTrainingsRequest;

class CommonResource extends BaseResource
{
    public function getGroups(): Response
    {
        return $this->connector->send(new GetGroupsRequest());
    }

    public function getPersonalManagers(): Response
    {
        return $this->connector->send(new GetPersonalManagersListRequest());
    }

    public function getTrainings(): Response
    {
        return $this->connector->send(new GetTrainingsRequest());
    }
}