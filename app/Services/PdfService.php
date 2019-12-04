<?php

declare(strict_types=1);

namespace Sms\Services;

use Illuminate\Support\Facades\Storage;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Sms\Models\Service;

/**
 * Class PdfService
 * @package Sms\Services
 */
class PdfService
{
    protected $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function generatePdf(int $ticketId, string $type): string
    {
        $ticket = $this->ticketService->ticket($ticketId);
        $service = Service::firstOrFail();
        $user = auth()->user();

        $pdf = PDF::loadView("pdf.layouts.$type", compact('ticket', 'user', 'service'));
        Storage::disk('public')->put("temp/$type-$ticket->token.pdf", $pdf->output());

        return public_path("storage/temp/$type-$ticket->token.pdf");
    }
}
