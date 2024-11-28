<?php

namespace App\Enums;



enum StoreStatus :string
{
    case PENDING = "pending";
    case INACTIVE = 'inactive';
    case ACTIVE = 'active';
}
