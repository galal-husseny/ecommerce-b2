<?php
namespace App\Enums;

enum OrderEnum: int
{
    case PENDING = 0;
    case SHIPPED = 1;
    case DELIVERED = 2;
}
