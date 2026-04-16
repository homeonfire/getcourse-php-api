<?php

namespace GetCourse\Api\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use GetCourse\Api\Requests\Offer\GetOfferByIdRequest;
use GetCourse\Api\Requests\Offer\GetOffersTagsRequest;
use GetCourse\Api\Requests\Offer\GetOffersRequest;

class OfferResource extends BaseResource
{
    public function getById(int $offerId): Response
    {
        return $this->connector->send(new GetOfferByIdRequest($offerId));
    }

    public function getTags(?int $limit = null, ?int $offset = null): Response
    {
        return $this->connector->send(new GetOffersTagsRequest($limit, $offset));
    }

    public function getAll(): Response
    {
        return $this->connector->send(new GetOffersRequest());
    }
}