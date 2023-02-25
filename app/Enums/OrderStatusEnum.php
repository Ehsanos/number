<?php
namespace App\Enums;

enum OrderStatusEnum:string
{
    case Wait = 'wait';
    case Success = 'success';
    case Cancelled = 'cancelled';




    public function getValue(): string
    {

        return match ($this) {
            self::Success => 'نجاح',
            self::Cancelled => 'تم الغاء الطلب',
            self::Wait => 'انتظار',
        };

    }
}

