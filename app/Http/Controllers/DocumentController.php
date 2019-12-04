<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use Sms\Helpers\ApiResponse;
use Sms\Models\Service;
use Sms\Models\Ticket;
use Sms\Services\PdfService;

/**
 * Class PdfController
 * @package Sms\Http\Controllers
 */
class DocumentController extends Controller
{
    /**
     * @var PdfService
     */
    protected $pdfService;

    /**
     * DocumentController constructor.
     * @param ApiResponse $apiResponse
     * @param PdfService $pdfService
     */
    public function __construct(ApiResponse $apiResponse, PdfService $pdfService)
    {
        parent::__construct($apiResponse);
        $this->pdfService = $pdfService;
    }

    /**
     * @param int $ticketId
     * @param string $type
     * @return mixed
     */
    public function creation(int $ticketId, string $type)
    {
        $path = $this->pdfService->generatePdf($ticketId, $type);

        return response()->download($path)->deleteFileAfterSend();
    }

    /**
     * @param $ticketId
     * @return mixed
     */
    public function returning($ticketId)
    {
        $ticket = Ticket::with('client', 'device')->findOrFail($ticketId);
        $service = Service::firstOrFail();
        $user = auth()->user();

        $pdf = PDF::loadView('pdf.layouts.returning', compact('ticket', 'user', 'service'));

        return $pdf->download('returning-' . $ticket->token . '.pdf');
    }

    /**
     * @param $ticketId
     * @return mixed
     */
    public function resignation($ticketId)
    {
        $ticket = Ticket::with('client', 'device')->findOrFail($ticketId);
        $service = Service::firstOrFail();
        $user = auth()->user();

        $pdf = PDF::loadView('pdf.layouts.resignation', compact('ticket', 'user', 'service'));

        return $pdf->download('resignation-' . $ticket->token . '.pdf');
    }
}
