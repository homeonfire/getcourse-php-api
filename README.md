Вот полный, структурированный `README.md`, который идеально подойдет для публикации пакета на GitHub или использования внутри твоих проектов. Он написан так, чтобы любой разработчик (или ты сам спустя пару месяцев) мог за минуту скопировать нужный кусок кода и внедрить его.

Просто скопируй этот текст и вставь в свой файл `README.md`.

***

# GetCourse API PHP Client

Мощная, строго типизированная и удобная PHP-библиотека для работы с API GetCourse (v1). 
Библиотека построена на базе современного HTTP-клиента [Saloon v3](https://docs.saloon.dev/), что делает её легковесной, надежной и фреймворк-агностичной (отлично работает как в чистом PHP, так и в Laravel).

## 📦 Установка

Установите пакет через Composer:

```bash
composer require aifire/getcourse-api
```

## 🚀 Быстрый старт

Для начала работы необходимо создать экземпляр главного клиента, передав домен вашей школы и ключи авторизации. Токен будет собран автоматически.

```php
require __DIR__ . '/vendor/autoload.php';

use GetCourse\Api\GetCourseClient;

$client = new GetCourseClient(
    schoolDomain: 'your-school.getcourse.ru',
    developerKey: 'КЛЮЧ_РАЗРАБОТЧИКА',
    schoolApiKey: 'КЛЮЧ_АПИ_ШКОЛЫ'
);
```

### Обработка ответов
Библиотека использует объекты `Response` от Saloon. Получить данные очень просто:

```php
$response = $client->users()->getFields(email: 'test@example.com');

if ($response->successful()) {
    // Получить массив данных (содержимое ключа 'data')
    $data = $response->json('data'); 
} else {
    // Обработка ошибки
    $status = $response->status();
    $errorMessage = $response->json('message');
}
```

---

## 📚 Доступные ресурсы и методы

API разделено на логические ресурсы. Вызывайте нужный ресурс через методы клиента: `$client->users()`, `$client->deals()` и т.д.

### 👤 Пользователи (`$client->users()`)

* **`getFields(?int $userId, ?string $email)`** — Получить базовые поля пользователя.
* **`addBalance(int $value, ?int $userId, ?string $email, string $type, string $comment)`** — Пополнить баланс.
* **`getBalance(?int $userId, ?string $email, string $type)`** — Узнать текущий баланс.
* **`getGroups(?int $userId, ?string $email)`** — Получить список групп пользователя.
* **`addGroups(array $groups, ?int $userId, ?string $email)`** — Добавить в группы (передайте массив ID).
* **`removeGroups(array $groups, ?int $userId, ?string $email)`** — Удалить из групп.
* **`setGroups(array $groups, ?int $userId, ?string $email)`** — Жестко задать список групп (остальные удалятся).
* **`getCustomFields(...)` / `updateCustomFields(...)`** — Чтение и запись дополнительных полей профиля.
* **`updateFields(array $fields, ...)`** — Обновить стандартные поля (имя, телефон, город и т.д.).
* **`setPersonalManager(?int $managerId, ...)`** — Назначить или удалить персонального менеджера.
* **`getPurchases(...)` / `getDeals(...)`** — Получить список покупок или заказов.
* **Обучение:** `getAnswers()`, `getDiplomas()`, `getGoalRecords()`, `getLessonAnswers()`, `getSchedule()`, `getTrainings()`.
* **`createDiploma(int $templateId, ...)`** — Выдать диплом (POST).
* **`getByTelegramChatId(int $chatId)`** — Найти пользователя по Telegram ID.

### 💰 Заказы (`$client->deals()`)

* **`getFields(int $dealId)`** — Получить всю информацию о заказе.
* **`updateFields(int $dealId, array $fields)`** — Обновить заказ (изменить статус, менеджера, теги).
* **`addPositions(int $dealId, array $positions)`** — Добавить позиции в заказ (офферы).
* **`removePositions(int $dealId, array $positionIds)`** — Удалить позиции из заказа.
* **`addComment(int $dealId, int $userId, string $text)`** — Добавить комментарий к заказу.
* **`getComments(int $dealId)`** — Получить историю комментариев.
* **`getCalls(int $dealId)`** — Получить историю звонков.
* **`getCustomFields(int $dealId)`** — Получить дополнительные поля заказа.
* **`getCancelReasons()`** — Справочник причин отказа.
* **`getDealsTags(?int $limit, ?int $offset)`** — Массово получить заказы и их теги.

### 🛍 Предложения (`$client->offers()`)

* **`getAll()`** — Получить список всех предложений школы.
* **`getById(int $offerId)`** — Детальная информация по одному предложению.
* **`getTags(?int $limit, ?int $offset)`** — Получить теги предложений.

### 💬 Диалоги (`$client->dialogs()`)

* **`getHistory(int $dialogId, int $limit = 100)`** — Получить историю переписки.
* **`addComment(int $dialogId, string $commentText, array $transport, int $userId)`** — Написать сообщение пользователю.
* **`changeDepartment(int $dialogId, int $newDepartmentId)`** — Перевести диалог в другой отдел.
* **`close(int $dialogId)`** — Закрыть диалог.

### 🎓 Уроки (`$client->lessons()`)

* **`getAnswers(int $lessonId)`** — Получить ответы учеников на урок.
* **`addComment(int $lessonAnswerId, string $text, int $userId)`** — Оставить комментарий к ответу.
* **`changeStatus(int $lessonAnswerId, string $status)`** — Принять/отклонить ответ (`accepted`, `declined`, `viewed`).

### 📹 Вебинары (`$client->webinars()`)

* **`getAll()`** — Список всех вебинаров.
* **`getByIds(array $ids)`** — Получить вебинары по массиву ID.
* **`addComment(int $moderatorId, int $webinarId, string $text, array $optionalParams)`** — Написать в чат вебинара.
* **`moderateComment(int $webinarId, int $commentId, string $action, ?int $moderatorId)`** — Модерация сообщения (`delete`, `premoderation_accept`, и т.д.).
* **`moderateUser(int $webinarId, int $userId, int $userType, string $action, ...)`** — Изолировать (забанить) пользователя в чате.

### 🌍 Общие справочники (`$client->common()`)

* **`getGroups()`** — Получить список всех групп школы.
* **`getPersonalManagers()`** — Список сотрудников с правами менеджера.
* **`getTrainings()`** — Список всех тренингов.

### 📝 Заметки (`$client->notes()`)
* **`add(int $dialogId, string $text)`** — Оставить внутреннюю текстовую заметку.

### ⚙️ Вебхуки (`$client->webhooks()`)
* **`setUri(string $uri, int $eventObjectId, int $eventId)`** — Подключить отправку эвентов (событий) из GetCourse на ваш внешний сервер.

---

## 🛠 Пример сложного сценария (Быстрый запуск продукта)

Пример того, как можно выстроить логику скрипта: находим пользователя, проверяем баланс, создаем ему заказ и отправляем уведомление в диалог.

```php
// 1. Ищем пользователя
$userRes = $client->users()->getFields(email: 'client@mail.ru');
$userId = $userRes->json('data.0.id');

// 2. Добавляем в группу
$client->users()->addGroups([15], userId: $userId);

// 3. Отправляем сообщение в диалог
$client->dialogs()->addComment(
    dialogId: 12345, 
    commentText: "Привет! Доступ открыт.", 
    transport: [1, 3], // Email, Telegram
    userId: 1 // ID менеджера
);
```

***

Архитектура готова, код разбит на аккуратные классы. Библиотека получилась самодостаточной и отлично ложится в концепцию быстрой сборки интеграций. 

Есть ли что-то еще по функционалу API, что ты хотел бы добавить, или пакет можно считать закрытым и готовым к деплою? Если хочешь обернуть всё это в красивый Laravel Service Provider — дай знать.