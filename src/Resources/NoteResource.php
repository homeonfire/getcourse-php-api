<?php

namespace GetCourse\Api\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use GetCourse\Api\Requests\Note\AddNoteRequest;

class NoteResource extends BaseResource
{
    public function add(int $dialogId, string $text): Response
    {
        return $this->connector->send(new AddNoteRequest($dialogId, $text));
    }
}