<?php

namespace GetCourse\Api\Requests\User;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetUserByTelegramChatIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user/get-user-by-telegram-chat-id';
    }

    public function __construct(
        protected int $chatId
    ) {}

    protected function defaultQuery(): array
    {
        return [
            'chatId' => $this->chatId,
        ];
    }
}