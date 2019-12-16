<?php

declare(strict_types=1);

namespace BehatTests;

use Behat\Behat\Context\Context;
use BehatTests\helpers\Clients;
use BehatTests\helpers\Devices;
use BehatTests\helpers\Requesting;
use BehatTests\helpers\Tickets;
use BehatTests\helpers\Users;

/**
 * Class TicketsContext
 * @package BehatTests
 */
class TicketsContext implements Context
{
    use Requesting, Tickets, Users, Clients, Devices;
}
