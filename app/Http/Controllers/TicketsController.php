<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Mailers\AppMailer;

class TicketsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, Ticket $ticket)
    {
        $search = $request->get('search', '');
        $tickets = Ticket::search($search)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('tickets.index', ['ticket' => $ticket], compact('ticket', 'search'));
    }

    public function create(Ticket $ticket)
    {
        $ticket = Ticket::all();

        return view('tickets.create', compact('ticket'));
    }

    public function store(Request $request, Ticket $ticket, AppMailer $mailer,)
    {
        $this->validate($request, [
            'codigo' => 'required',
            'ticket_id' => 'required',
            'cliente' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'assunto' => 'required',
            'descritivo' => 'required',
            'data' => 'required',
            'hora' => 'required',
            'abertura' => 'required',
            'ticket_priority' => 'required',
            'categoria' => 'required',
            'status' => 'required'
        ]);

        $ticket = new Ticket([
            'codigo' => Str::random($ticket = 10),
            'ticket_id' => Str::random($ticket = 10),
            'user_id' => Auth::user()->id,
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone'),
            'assunto' => $request->input('assunto'),
            'descritivo' => $request->input('descritivo'),
            'data' => $request->input('data'),
            'hora' => $request->input('hora'),
            'abertura' => $request->input('abertura'),
            'ticket_priority' => $request->input('ticket_priority'),
            'categoria' => $request->input('categoria'),
            'status' => "Open"
        ]);

        $ticket->save();
        $mailer->sendTicketInformation(Auth::user(), $ticket);

        return redirect()->back()->with("status", "A ticket with ID: #$ticket->ticket_id has been opened.");
    }

    public function userTickets()
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->paginate(10);

        return view('tickets.user_tickets', compact('tickets'));
    }

    public function show($ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

        return view('tickets.show', compact('ticket'));
    }

    public function close($ticket_id, AppMailer $mailer)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        $ticket->status = "Closed";
        $ticket->save();
        $ticketOwner = $ticket->user;
        $mailer->sendTicketStatusNotification($ticketOwner, $ticket);

        return redirect()->back()->with("status", "The ticket has been closed.");
    }
}
