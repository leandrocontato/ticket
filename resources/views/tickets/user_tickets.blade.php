<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('my_tickets') }}
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
                                    <i class="fa fa-ticket"> My Tickets</i>
                                </div>
                                <div class="panel-body">
                                    @if ($tickets->isEmpty())
                                        <p>You have not created any tickets.</p>
                                    @else
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Category</th>
                                                    <th>Title</th>
                                                    <th>Status</th>
                                                    <th>Last Updated</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tickets as $ticket)
                                                    <tr>
                                                        <td>{{ $ticket->codigo }}</td>
                                                        <td>{{ $ticket->ticket_id }}</td>
                                                        <td>{{ $ticket->cliente }}</td>
                                                        <td>{{ $ticket->email }}</td>
                                                        <td>{{ $ticket->telefone }}</td>
                                                        <td>{{ $ticket->assunto }}</td>
                                                        <td>{{ $ticket->descritivo }}</td>
                                                        <td>{{ $ticket->data }}</td>
                                                        <td>{{ $ticket->hora }}</td>
                                                        <td>{{ $ticket->abertura }}</td>
                                                        <td>{{ $ticket->ticket_priority }}</td>
                                                        <td>{{ $ticket->categoria }}</td>
                                                        <td><a href="{{ url('tickets/' . $ticket->ticket_id) }}">
                                                                #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                                            </a></td>
                                                        <td>
                                                            @if ($ticket->status == 'Open')
                                                                <span
                                                                    class="label label-success">{{ $ticket->status }}</span>
                                                            @else
                                                                <span
                                                                    class="label label-danger">{{ $ticket->status }}</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $ticket->updated_at }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $tickets->render() }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
