<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('tickets/{ticket_id}') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    #{{ $ticket->ticket_id }}
                                </div>
                                <div class="panel-body">
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <div class="ticket-info">
                                        <p>{{ $ticket->codigo }}</p>
                                        <p>{{ $ticket->ticket_id }}</p>
                                        <p>{{ $ticket->cliente }}</p>
                                        <p>{{ $ticket->email }}</p>
                                        <p>{{ $ticket->telefone }}</p>
                                        <p>{{ $ticket->assunto }}</p>
                                        <p>{{ $ticket->descritivo }}</p>
                                        <p>{{ $ticket->data }}</p>
                                        <p>{{ $ticket->hora }}</p>
                                        <p>{{ $ticket->abertura }}</p>
                                        <p>{{ $ticket->ticket_priority }}</p>
                                        <p>{{ $ticket->categoria }}</p>
                                        <p>
                                            @if ($ticket->status === 'Open')
                                                Status: <span
                                                    class="label label-success">{{ $ticket->status }}</span>
                                            @else
                                                Status: <span class="label label-danger">{{ $ticket->status }}</span>
                                            @endif
                                        </p>
                                        <p>Created on: {{ $ticket->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @include('tickets.comments')
                            <hr>
                            @include('tickets.reply')
                        </div>
                    </div>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
