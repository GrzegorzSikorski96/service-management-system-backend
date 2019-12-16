<?php

declare(strict_types=1);

namespace BehatTests;

use Behat\Behat\Context\Context;
use BehatTests\helpers\Devices;
use BehatTests\helpers\Requesting;
use BehatTests\helpers\Users;

/**
 * Class DevicesContext
 * @package BehatTests
 */
class DevicesContext implements Context
{
    use Requesting, Users, Devices;
}
