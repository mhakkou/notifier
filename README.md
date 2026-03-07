# mhakkou/notifier

A framework-agnostic PHP notification package for sending messages across multiple channels. Works with Symfony, Laravel, or any native PHP project.

## Features

- Multiple notification channels: **Email**, **Telegram**, **Slack**
- Framework-agnostic — works with Symfony, Laravel, or plain PHP
- Built with clean OOP principles: interfaces, abstract classes, and inheritance
- Implements **Factory pattern** for easy channel creation
- Implements **Command pattern** for queuing and executing multiple notifications
- PSR-4 autoloading via Composer

## Requirements

- PHP >= 8.1
- Composer

## Installation

```bash
composer require mhakkou/notifier
```

## Usage

### Send a single notification

```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use Mhakkou\Notifier\Factory\NotificationFactory;

$notification = NotificationFactory::create(NotificationFactory::EMAIL_NOTIFICATION);
$notification->send('sender', 'recipient', 'subject', 'message');
```

### Available channels

```php
NotificationFactory::EMAIL_NOTIFICATION
NotificationFactory::TELEGRAM_NOTIFICATION
NotificationFactory::SLACK_NOTIFICATION
```

### Send multiple notifications at once (Command pattern)

```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use Mhakkou\Notifier\Factory\NotificationFactory;
use Mhakkou\Notifier\Commands\SendNotificationCommand;
use Mhakkou\Notifier\Services\NotificationInvoker;

$invoker = new NotificationInvoker();

$invoker->addCommand(new SendNotificationCommand(
    NotificationFactory::create(NotificationFactory::EMAIL_NOTIFICATION),
    'sender', 'recipient', 'subject', 'message'
));

$invoker->addCommand(new SendNotificationCommand(
    NotificationFactory::create(NotificationFactory::TELEGRAM_NOTIFICATION),
    'sender', 'recipient', 'subject', 'message'
));

$invoker->addCommand(new SendNotificationCommand(
    NotificationFactory::create(NotificationFactory::SLACK_NOTIFICATION),
    'sender', 'recipient', 'subject', 'message'
));

$invoker->run(); // fires all three channels in sequence
```

## Project Structure

```
src/
├── Contracts/
│   └── NotificationInterface.php   # Contract all channels must implement
├── Notifications/
│   ├── BaseNotification.php        # Abstract base class with shared logic
│   ├── EmailNotification.php
│   ├── TelegramNotification.php
│   └── SlackNotification.php
├── Factory/
│   └── NotificationFactory.php     # Factory for creating notification channels
├── Commands/
│   └── SendNotificationCommand.php # Command pattern implementation
└── Services/
    └── NotificationInvoker.php     # Invoker that queues and runs commands

examples/
├── send_email.php
├── send_telegram.php
├── send_slack.php
└── send_multiple.php
```

## Examples

Ready-to-run examples are available in the [`examples/`](examples/) directory.

## Adding a New Channel

1. Create a new class in `src/Notifications/` extending `BaseNotification`
2. Implement the `send()` method
3. Register it in `NotificationFactory`

## License

MIT © [Hakkou Mouataz](https://github.com/mhakkou)