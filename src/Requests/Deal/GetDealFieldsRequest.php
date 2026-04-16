<?php

namespace GetCourse\Api\Requests\Deal;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use GetCourse\Api\DTOs\DealData;
use Saloon\Http\Response;

class GetDealFieldsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/deal/get-fields';
    }

    public function __construct(
        protected int $dealId
    ) {}

    protected function defaultQuery(): array
    {
        return ['dealId' => $this->dealId];
    }

    /**
     * Автоматически конвертируем успешный ответ в DTO
     */
    public function createDtoFromResponse(Response $response): ?DealData
    {
        $data = $response->json('data');

        // У GetCourse данные часто лежат либо объектом, либо в массиве из одного элемента
        if (empty($data)) {
            return null;
        }

        $dealArray = is_array($data) && isset($data[0]) ? $data[0] : $data;

        return DealData::fromArray($dealArray);
    }
}