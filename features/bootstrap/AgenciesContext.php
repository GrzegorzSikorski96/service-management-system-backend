<?php

declare(strict_types=1);

namespace BehatTests;

use Behat\Behat\Context\Context;
use BehatTests\helpers\Agencies;
use BehatTests\helpers\Requesting;
use BehatTests\helpers\Users;

/**
 * Class AgenciesContext
 * @package BehatTests
 */
class AgenciesContext implements Context
{
    use Requesting, Users, Agencies;
}
