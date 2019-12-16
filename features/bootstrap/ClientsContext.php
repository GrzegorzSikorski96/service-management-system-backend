<?php

declare(strict_types=1);

namespace BehatTests;

use Behat\Behat\Context\Context;
use BehatTests\helpers\Clients;
use BehatTests\helpers\Requesting;
use BehatTests\helpers\Users;

/**
 * Class ClientsContext
 * @package BehatTests
 */
class ClientsContext implements Context
{
    use Requesting, Users, Clients;
}
