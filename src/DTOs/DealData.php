<?php

namespace GetCourse\Api\DTOs;

class DealData
{
    public function __construct(
        public readonly int $id,
        public readonly string $status,
        public readonly float $cost,
        public readonly float $payedMoney,
        public readonly float $leftMoney,
        public readonly ?string $createdAtGetCourse,
        public readonly ?string $paymentDate,
        // Оставляем весь сырой массив на случай, если понадобятся экзотические поля
        public readonly array $raw 
    ) {}

    /**
     * Фабрика для сборки объекта из массива ответа GetCourse
     */
    public static function fromArray(array $data): self
    {
        return new self(
            id: (int) ($data['id'] ?? 0),
            status: (string) ($data['status'] ?? 'new'),
            cost: (float) ($data['cost'] ?? 0),
            payedMoney: (float) ($data['payed_money'] ?? 0),
            leftMoney: (float) ($data['left_money'] ?? 0),
            // Забираем оригинальную дату создания прямо из ответа GK
            createdAtGetCourse: $data['created_at'] ?? null,
            paymentDate: $data['payment_date'] ?? null,
            raw: $data
        );
    }

    /**
     * Хелпер: Получить приоритетную дату создания для аналитики
     */
    public function getCreationDate(): ?string
    {
        // Для виджетов аналитики данных система должна строго приоритизировать 
        // дату создания из самого GetCourse (GK). Это гарантирует, что 
        // расчет выручки будет точным и не поплывет из-за рассинхрона систем.
        return $this->createdAtGetCourse;
    }

    /**
     * Хелпер: Оплачен ли заказ полностью?
     */
    public function isFullyPaid(): bool
    {
        return $this->status === 'payed' || $this->leftMoney <= 0;
    }
}