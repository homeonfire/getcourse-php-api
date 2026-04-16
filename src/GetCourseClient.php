<?php

namespace GetCourse\Api;

use Saloon\Http\Connector;
use Saloon\Http\Auth\TokenAuthenticator;
use GetCourse\Api\Resources\UserResource;

class GetCourseClient extends Connector
{
    /**
     * @param string $schoolDomain Домен школы, например: my-school.getcourse.ru
     * @param string $developerKey Ключ Разработчика
     * @param string $schoolApiKey Ключ Апи Школы
     */
    public function __construct(
        protected string $schoolDomain,
        protected string $developerKey,
        protected string $schoolApiKey
    ) {}

    /**
     * Базовый URL для всех эндпоинтов из OpenAPI схемы
     */
    public function resolveBaseUrl(): string
    {
        $domain = rtrim($this->schoolDomain, '/');
        
        return "https://{$domain}/pl/api/v1";
    }

    /**
     * Автоматическая сборка Bearer-токена по правилам GetCourse
     */
    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator("{$this->developerKey}_{$this->schoolApiKey}");
    }

    /**
     * Заголовки по умолчанию
     */
    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    /**
     * Ресурс для работы с Пользователями
     */
    public function users(): UserResource
    {
        return new UserResource($this);
    }

    /**
     * Ресурс для работы с Заказами (Deals)
     */
    public function deals(): \GetCourse\Api\Resources\DealResource
    {
        return new \GetCourse\Api\Resources\DealResource($this);
    }

    /**
     * Ресурс для работы с Предложениями (Offers)
     */
    public function offers(): \GetCourse\Api\Resources\OfferResource
    {
        return new \GetCourse\Api\Resources\OfferResource($this);
    }

    /**
     * Общие методы (школа, группы, тренинги)
     */
    public function common(): \GetCourse\Api\Resources\CommonResource
    {
        return new \GetCourse\Api\Resources\CommonResource($this);
    }

    /**
     * Ресурс для работы с Диалогами
     */
    public function dialogs(): \GetCourse\Api\Resources\DialogResource
    {
        return new \GetCourse\Api\Resources\DialogResource($this);
    }

    public function lessons(): \GetCourse\Api\Resources\LessonResource
    {
        return new \GetCourse\Api\Resources\LessonResource($this);
    }

    public function webinars(): \GetCourse\Api\Resources\WebinarResource
    {
        return new \GetCourse\Api\Resources\WebinarResource($this);
    }

    public function notes(): \GetCourse\Api\Resources\NoteResource
    {
        return new \GetCourse\Api\Resources\NoteResource($this);
    }

    public function webhooks(): \GetCourse\Api\Resources\WebhookResource
    {
        return new \GetCourse\Api\Resources\WebhookResource($this);
    }
}