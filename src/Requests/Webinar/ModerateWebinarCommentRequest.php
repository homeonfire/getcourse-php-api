<?php

namespace GetCourse\Api\Requests\Webinar;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class ModerateWebinarCommentRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/webinar/moderation-comment';
    }

    public function __construct(
        protected int $webinarId,
        protected int $commentId,
        protected string $action,
        protected ?int $moderatorId = null
    ) {}

    protected function defaultBody(): array
    {
        return array_filter([
            'webinarId' => $this->webinarId,
            'commentId' => $this->commentId,
            'action' => $this->action,
            'moderatorId' => $this->moderatorId,
        ]);
    }
}