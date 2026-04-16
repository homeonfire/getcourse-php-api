<?php

namespace GetCourse\Api\Requests\Dialog;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class ChangeDepartmentRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/dialog/change-department';
    }

    public function __construct(
        protected int $dialogId,
        protected int $newDepartmentId
    ) {}

    protected function defaultBody(): array
    {
        return [
            'dialogId' => $this->dialogId,
            'newDepartmentId' => $this->newDepartmentId,
        ];
    }
}