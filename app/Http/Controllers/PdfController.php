<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use Sms\Models\Service;
use Sms\Models\Ticket;

/**
 * Class PdfController
 * @package Sms\Http\Controllers
 */
class PdfController extends Controller
{
    /**
     * @param $ticketId
     * @return mixed
     */
    public function creation($ticketId)
    {
        $ticket = Ticket::with('client', 'device')->findOrFail($ticketId);
        $service = Service::firstOrFail();
        $user = auth()->user();

        $pdf = PDF::loadView('pdf.layouts.creation', compact('ticket', 'user', 'service'));

        return $pdf->download('creation-' . $ticket->token . '.pdf');
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
