<?php

namespace GetCourse\Api\Requests\Webinar;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class ModerateWebinarUserRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/webinar/moderation-user';
    }

    public function __construct(
        protected int $webinarId,
        protected int $userId,
        protected int $userType,
        protected string $action,
        protected ?int $moderatorId = null,
        protected ?int $webinarLaunchNumber = null
    ) {}

    protected function defaultBody(): array
    {
        return array_filter([
            'webinarId' => $this->webinarId,
            'userId' => $this->userId,
            'userType' => $this->userType,
            'action' => $this->action,
            'moderatorId' => $this->moderatorId,
            'webinarLaunchNumber' => $this->webinarLaunchNumber,
        ]);
    }
}