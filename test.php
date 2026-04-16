<?php

require __DIR__ . '/vendor/autoload.php';

use GetCourse\Api\GetCourseClient;
use GetCourse\Api\Requests\User\GetUserFieldsRequest;

// 1. Инициализируем клиент
$client = new GetCourseClient(
    schoolDomain: 'твоя-школа.getcourse.ru', // Замени на свой тестовый домен
    developerKey: 'ТВОЙ_КЛЮЧ_РАЗРАБОТЧИКА',  // Замени на реальные ключи (или оставь фейки, чтобы просто увидеть ошибку 403 от сервера)
    schoolApiKey: 'ТВОЙ_КЛЮЧ_ШКОЛЫ'
);

// 2. Создаем запрос (например, ищем по email)
$request = new GetUserFieldsRequest(email: 'test@example.com');

// 3. Отправляем
$response = $client->send($request);

// 4. Смотрим результат
if ($response->successful()) {
    echo "Успех!\n";
    print_r($response->json());
} else {
    echo "Ошибка HTTP: " . $response->status() . "\n";
    print_r($response->json());
}