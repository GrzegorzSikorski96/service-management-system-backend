<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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
     * NoteController constructor.
     * @param ApiResponse $apiResponse
     * @param NoteService $noteService
     */
    public function __construct(ApiResponse $apiResponse, NoteService $noteService)
    {
        parent::__construct($apiResponse);
        $this->noteService = $noteService;

        $this->middleware('note.author', ['only' => ['edit', 'remove']]);
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
     * @return JsonResponse
     */
    public function edit(Note $data): JsonResponse
    {
        $edited = $this->noteService->edit($data->all(), $data['note']);

        return $this->apiResponse
            ->setMessage(__('messages.note.edit.success'))
            ->setData([
                'note' => $edited,
            ])
            ->setSuccessStatus()
            ->getResponse();
    }

    /**
     * @param Request $data
     * @return JsonResponse
     * @throws Exception
     */
    public function remove(Request $data): JsonResponse
    {
        $this->noteService->remove($data['note']);

        return $this->apiResponse
            ->setMessage(__('messages.note.remove.success'))
            ->setSuccessStatus()
            ->getResponse();
    }
}
