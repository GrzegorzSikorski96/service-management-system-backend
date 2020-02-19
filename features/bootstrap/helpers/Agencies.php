<?php

declare(strict_types=1);

namespace BehatTests\helpers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Sms\Creators\AgencyCreator;

/**
 * Trait Agencies
 * @package BehatTests\helpers
 */
trait Agencies
{
    /**
     * @Given agency with id :id exist
     * @param int $agencyId
     * @throws BindingResolutionException
     */
    public function agencyWithIdExist(int $agencyId): void
    {
        $creator = app()->make(AgencyCreator::class);
        $creator->createOrReplaceAgency($agencyId);
    }
}
