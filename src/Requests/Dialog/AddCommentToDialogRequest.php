<?php

namespace GetCourse\Api\Requests\Dialog;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class AddCommentToDialogRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/dialog/add-comment';
    }

    public function __construct(
        protected int $dialogId,
        protected string $commentText,
        protected array $transport,
        protected int $userId
    ) {}

    protected function defaultBody(): array
    {
        return [
            'dialogId' => $this->dialogId,
            'commentText' => $this->commentText,
            'transport' => $this->transport,
            'userId' => $this->userId,
        ];
    }
}