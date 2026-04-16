<?php

namespace GetCourse\Api\Requests\Webinar;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class AddCommentWebinarRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/webinar/add-comment';
    }

    public function __construct(
        protected int $moderatorId,
        protected int $webinarId,
        protected string $text,
        protected array $optionalParams = []
    ) {}

    protected function defaultBody(): array
    {
        return array_merge([
            'moderatorId' => $this->moderatorId,
            'webinarId' => $this->webinarId,
            'text' => $this->text,
        ], $this->optionalParams);
    }
}