<?php

namespace Mhakkou\Notifier\Enums;

Enum NotificationChannel: string {
    case TELEGRAM = 'telegram';
    case EMAIL = 'email';
    case SLACK = 'slack';
}