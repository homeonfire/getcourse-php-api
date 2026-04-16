<?php

namespace GetCourse\Api\Requests\Dialog;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetDialogHistoryRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/dialog/get-history';
    }

    public function __construct(
        protected int $dialogId,
        protected int $limit = 100
    ) {}

    protected function defaultQuery(): array
    {
        return [
            'dialogId' => $this->dialogId,
            'limit' => $this->limit,
        ];
    }
}