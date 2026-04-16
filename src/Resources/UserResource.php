<?php

namespace GetCourse\Api\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use GetCourse\Api\Requests\User\GetUserFieldsRequest;
use GetCourse\Api\Requests\User\AddBalanceRequest;
use GetCourse\Api\Requests\User\GetBalanceRequest;
use GetCourse\Api\Requests\User\GetUserGroupsRequest;
use GetCourse\Api\Requests\User\AddGroupsRequest;
use GetCourse\Api\Requests\User\RemoveGroupsRequest;
use GetCourse\Api\Requests\User\SetGroupsRequest;
use GetCourse\Api\Requests\User\GetUserCustomFieldsRequest;
use GetCourse\Api\Requests\User\UpdateUserCustomFieldsRequest;
use GetCourse\Api\Requests\User\UpdateUserFieldsRequest;
use GetCourse\Api\Requests\User\SetPersonalManagerRequest;
use GetCourse\Api\Requests\User\GetUserPurchasesRequest;
use GetCourse\Api\Requests\User\GetUserDealsRequest;
use GetCourse\Api\Requests\User\GetUserAnswersRequest;
use GetCourse\Api\Requests\User\GetUserDiplomasRequest;
use GetCourse\Api\Requests\User\GetUserGoalRecordsRequest;
use GetCourse\Api\Requests\User\GetUserLessonAnswersRequest;
use GetCourse\Api\Requests\User\GetUserScheduleRequest;
use GetCourse\Api\Requests\User\GetUserTrainingsRequest;
use GetCourse\Api\Requests\User\GetUserByTelegramChatIdRequest;
use GetCourse\Api\Requests\User\CreateUserDiplomaRequest;

class UserResource extends BaseResource
{
    /**
     * Получить информацию по пользователю
     *
     * @param int|null $userId ID пользователя
     * @param string|null $email Email пользователя
     */
    public function getFields(?int $userId = null, ?string $email = null): Response
    {
        return $this->connector->send(new GetUserFieldsRequest($userId, $email));
    }

    /**
     * Пополнить баланс пользователя
     *
     * @param int $value Сумма пополнения
     * @param int|null $userId ID пользователя
     * @param string|null $email Email пользователя
     * @param string $type Тип баланса (virtual или points)
     * @param string $comment Комментарий к операции
     */
    public function addBalance(int $value, ?int $userId = null, ?string $email = null, string $type = 'virtual', string $comment = ''): Response
    {
        return $this->connector->send(new AddBalanceRequest($value, $userId, $email, $type, $comment));
    }

    /**
     * Получить баланс пользователя
     *
     * @param int|null $userId ID пользователя
     * @param string|null $email Email пользователя
     * @param string $type Тип баланса (normal, virtual или points)
     */
    public function getBalance(?int $userId = null, ?string $email = null, string $type = 'virtual'): Response
    {
        return $this->connector->send(new GetBalanceRequest($userId, $email, $type));
    }

    /**
     * Получить группы пользователя
     */
    public function getGroups(?int $userId = null, ?string $email = null): Response
    {
        return $this->connector->send(new GetUserGroupsRequest($userId, $email));
    }

    /**
     * Добавить пользователя в группы
     * * @param array $groups Массив с ID групп
     */
    public function addGroups(array $groups, ?int $userId = null, ?string $email = null): Response
    {
        return $this->connector->send(new AddGroupsRequest($groups, $userId, $email));
    }

    /**
     * Удалить пользователя из групп
     * * @param array $groups Массив с ID групп
     */
    public function removeGroups(array $groups, ?int $userId = null, ?string $email = null): Response
    {
        return $this->connector->send(new RemoveGroupsRequest($groups, $userId, $email));
    }

    /**
     * Задать точный список групп пользователя (остальные будут удалены)
     * * @param array $groups Массив с ID групп
     */
    public function setGroups(array $groups, ?int $userId = null, ?string $email = null): Response
    {
        return $this->connector->send(new SetGroupsRequest($groups, $userId, $email));
    }

    public function getCustomFields(?int $userId = null, ?string $email = null): Response
    {
        return $this->connector->send(new GetUserCustomFieldsRequest($userId, $email));
    }

    public function updateCustomFields(array $customFields, ?int $userId = null, ?string $email = null): Response
    {
        return $this->connector->send(new UpdateUserCustomFieldsRequest($customFields, $userId, $email));
    }

    public function updateFields(array $fields, ?int $userId = null, ?string $email = null): Response
    {
        return $this->connector->send(new UpdateUserFieldsRequest($fields, $userId, $email));
    }

    public function setPersonalManager(?int $managerId = null, ?int $userId = null, ?string $email = null): Response
    {
        return $this->connector->send(new SetPersonalManagerRequest($managerId, $userId, $email));
    }

    public function getPurchases(?int $userId = null, ?string $email = null, ?string $productId = null): Response
    {
        return $this->connector->send(new GetUserPurchasesRequest($userId, $email, $productId));
    }

    public function getDeals(?int $userId = null, ?string $email = null): Response
    {
        return $this->connector->send(new GetUserDealsRequest($userId, $email));
    }

    public function getAnswers(?int $userId = null, ?string $email = null): Response
    {
        return $this->connector->send(new GetUserAnswersRequest($userId, $email));
    }

    public function getDiplomas(?int $userId = null, ?string $email = null): Response
    {
        return $this->connector->send(new GetUserDiplomasRequest($userId, $email));
    }

    public function getGoalRecords(?int $userId = null, ?string $email = null): Response
    {
        return $this->connector->send(new GetUserGoalRecordsRequest($userId, $email));
    }

    public function getLessonAnswers(?int $userId = null, ?string $email = null): Response
    {
        return $this->connector->send(new GetUserLessonAnswersRequest($userId, $email));
    }

    public function getSchedule(?int $userId = null, ?string $email = null): Response
    {
        return $this->connector->send(new GetUserScheduleRequest($userId, $email));
    }

    public function getTrainings(?int $userId = null, ?string $email = null): Response
    {
        return $this->connector->send(new GetUserTrainingsRequest($userId, $email));
    }

    public function getByTelegramChatId(int $chatId): Response
    {
        return $this->connector->send(new GetUserByTelegramChatIdRequest($chatId));
    }

    public function createDiploma(
        int $templateId,
        ?int $userId = null,
        ?string $email = null,
        ?string $number = null,
        ?string $trainingName = null,
        ?string $userName = null,
        bool $allowDuplicates = false
    ): Response {
        return $this->connector->send(new CreateUserDiplomaRequest(
            $templateId, $userId, $email, $number, $trainingName, $userName, $allowDuplicates
        ));
    }
}