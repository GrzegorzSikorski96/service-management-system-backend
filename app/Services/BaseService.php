<?php

declare(strict_types=1);

namespace Sms\Services;

use Sms\Models\User;

/**
 * Class BaseService
 * @package Sms\Services
 */
class BaseService
{
    /**
     * @var AgencyService
     */
    protected $agencyService;
    /**
     * @var NoteService
     */
    protected $noteService;

    /**
     * BaseService constructor.
     * @param AgencyService $agencyService
     * @param NoteService $noteService
     */
    public function __construct(AgencyService $agencyService, NoteService $noteService)
    {
        $this->agencyService = $agencyService;
        $this->noteService = $noteService;
    }

    /**
     * @return User
     */
    protected function currentUser(): User
    {
        return auth()->user();
    }
}
