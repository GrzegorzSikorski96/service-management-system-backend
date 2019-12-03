<?php

declare(strict_types=1);

namespace Sms\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Sms\Models\Ticket;

class PdfController extends Controller
{
    public function getPdf($id)
    {
        $ticket = Ticket::find($id);
        $pdf = PDF::loadView('pdf', compact('ticket'));

        return $pdf->download('ticket.pdf');
    }
}
