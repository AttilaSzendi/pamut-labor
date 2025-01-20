<?php

namespace App\Enums;

enum StatusEnum: string
{
    use EnumHelper;

    case WAIT_FOR_DEVELOPMENT = 'wait for development';
    case IN_PROGRESS = 'in progress';
    case RELEASED = 'released';
}
