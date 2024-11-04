<?php

namespace App\Enum;

enum TransactionType: string
{
    case CARTAO_CREDITO = 'C';
    case CARTAO_DEBITO = 'D';
    case PIX = 'P';

    public static function toArray(): array
    {
        return [
            self::CARTAO_CREDITO->value,
            self::CARTAO_DEBITO->value,
            self::PIX->value,
        ];
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::CARTAO_CREDITO => 'Cartão de Crédito',
            self::CARTAO_DEBITO => 'Carta de Débito',
            self::PIX => 'PIX',
        };
    }

    public function getTax(): float
    {
        return match ($this) {
            self::CARTAO_CREDITO => 5,
            self::CARTAO_DEBITO => 3,
            self::PIX => 0,
        };
    }
}
