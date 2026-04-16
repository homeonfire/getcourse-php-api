<?php

namespace GetCourse\Api;

use Saloon\Http\Connector;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\PendingRequest;
use Saloon\Http\Response;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class GetCourseClient extends Connector
{
    protected ?Logger $internalLogger = null;

    public function __construct(
        protected string $schoolDomain,
        protected string $developerKey,
        protected string $schoolApiKey
    ) {}

    /**
     * Включить встроенное логирование всех запросов и ответов
     *
     * @param string $logFilePath Путь до файла логов (по умолчанию 'getcourse_api.log' в текущей папке)
     */
    public function enableLogging(string $logFilePath = 'getcourse_api.log'): static
    {
        $this->internalLogger = new Logger('getcourse-api');
        // Пишем логи уровня DEBUG и выше
        $this->internalLogger->pushHandler(new StreamHandler($logFilePath, Logger::DEBUG));

        return $this;
    }

    /**
     * Перехватчик Saloon (срабатывает автоматически при каждом запросе)
     */
    public function boot(PendingRequest $pendingRequest): void
    {
        if (! $this->internalLogger) {
            return;
        }

        // Логируем, что отправляем
        $pendingRequest->middleware()->onRequest(function (PendingRequest $request) {
            $this->internalLogger->info("➡️ [REQ] {$request->getMethod()->value} {$request->getUri()}", [
                'body' => $request->body()?->all(),
            ]);
        });

        // Логируем, что получили
        $pendingRequest->middleware()->onResponse(function (Response $response) {
            $this->internalLogger->info("⬅️ [RES] {$response->status()} {$response->getPsrRequest()->getUri()}", [
                'body' => $response->json(),
            ]);
        });
    }

    public function resolveBaseUrl(): string
    {
        $domain = rtrim($this->schoolDomain, '/');
        
        return "https://{$domain}/pl/api/v1";
    }

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator("{$this->developerKey}_{$this->schoolApiKey}");
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    // --- ПОДКЛЮЧЕНИЕ РЕСУРСОВ ---

    public function users(): \GetCourse\Api\Resources\UserResource
    {
        return new \GetCourse\Api\Resources\UserResource($this);
    }

    public function deals(): \GetCourse\Api\Resources\DealResource
    {
        return new \GetCourse\Api\Resources\DealResource($this);
    }

    public function offers(): \GetCourse\Api\Resources\OfferResource
    {
        return new \GetCourse\Api\Resources\OfferResource($this);
    }

    public function dialogs(): \GetCourse\Api\Resources\DialogResource
    {
        return new \GetCourse\Api\Resources\DialogResource($this);
    }

    public function common(): \GetCourse\Api\Resources\CommonResource
    {
        return new \GetCourse\Api\Resources\CommonResource($this);
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