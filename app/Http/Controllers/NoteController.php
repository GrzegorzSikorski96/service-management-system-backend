<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Sms\Helpers\ApiResponse;
use Sms\Http\Requests\Note;
use Sms\Services\NoteService;

/**
 * Class NoteController
 * @package Sms\Http\Controllers
 */
class NoteController extends Controller
{
    /**
     * @var NoteService
     */
    protected $noteService;

    /**
     * TicketController constructor.
     * @param ApiResponse $apiResponse
     * @param NoteService $noteService
     */
    public function __construct(ApiResponse $apiResponse, NoteService $noteService)
    {
        parent::__construct($apiResponse);
        $this->noteService = $noteService;
    }

    /**
     * @param Note $data
     * @return JsonResponse
     */
    public function create(Note $data): JsonResponse
    {
        $note = $this->noteService->create($data->all());

        return $this->apiResponse
            ->setMessage(__('messages.note.create.success'))
            ->setData([
                'client' => $note,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param int $noteId
     * @return JsonResponse
     */
    public function note(int $noteId): JsonResponse
    {
        $note = $this->noteService->note($noteId);

        return $this->apiResponse
            ->setData([
                'note' => $note,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param Note $data
     * @param int $noteId
     * @return JsonResponse
     */
    public function edit(Note $data, int $noteId): JsonResponse
    {
        $edited = $this->noteService->edit($data->all(), $noteId);

        return $this->apiResponse
            ->setMessage(__('messages.note.edit.success'))
            ->setData([
                'note' => $edited,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param int $noteId
     * @return JsonResponse
     */
    public function remove(int $noteId): JsonResponse
    {
        $this->noteService->remove($noteId);

        return $this->apiResponse
            ->setMessage(__('messages.note.remove.success'))
            ->setSuccessStatus()
            ->getResponse();
    }
}
