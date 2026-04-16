<?php

namespace GetCourse\Api\Requests\Note;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class AddNoteRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/note/add';
    }

    public function __construct(
        protected int $dialogId,
        protected string $text
    ) {}

    protected function defaultBody(): array
    {
        return [
            'dialogId' => $this->dialogId,
            'text' => $this->text,
        ];
    }
}