<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tickets') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket"> Tickets</i>
                </div>
                <div class="panel-body">
                    @if ($tickets->isEmpty())
                        <p>There are currently no tickets.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Last Updated</th>
                                    <th style="text-align:center" colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ticket as $tickets)
                                    <tr>
                                        <td>
                                            {{ $ticket->name }}
                                        </td>
                                        <td>
                                            <a href="{{ url('tickets/' . $ticket->codigo) }}">
                                                #{{ $ticket->codigo }} - {{ $ticket->codigo }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url('tickets/' . $ticket->ticket_id) }}">
                                                #{{ $ticket->ticket_id }} - {{ $ticket->ticket_id }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url('tickets/' . $ticket->cliente) }}">
                                                #{{ $ticket->cliente }} - {{ $ticket->cliente }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url('tickets/' . $ticket->email) }}">
                                                #{{ $ticket->email }} - {{ $ticket->email }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url('tickets/' . $ticket->telefone) }}">
                                                #{{ $ticket->telefone }} - {{ $ticket->telefone }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url('tickets/' . $ticket->assunto) }}">
                                                #{{ $ticket->assunto }} - {{ $ticket->assunto }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url('tickets/' . $ticket->descritivo) }}">
                                                #{{ $ticket->descritivo }} - {{ $ticket->descritivo }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url('tickets/' . $ticket->data) }}">
                                                #{{ $ticket->data }} - {{ $ticket->data }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url('tickets/' . $ticket->hora) }}">
                                                #{{ $ticket->hora }} - {{ $ticket->hora }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url('tickets/' . $ticket->abertura) }}">
                                                #{{ $ticket->abertura }} - {{ $ticket->abertura }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url('tickets/' . $ticket->ticket_priority) }}">
                                                #{{ $ticket->ticket_priority }} - {{ $ticket->ticket_priority }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url('tickets/' . $ticket->categoria) }}">
                                                #{{ $ticket->categoria }} - {{ $ticket->categoria }}
                                            </a>
                                        </td>

                                        <td>
                                            @if ($ticket->status === 'Open')
                                                <span class="label label-success">{{ $ticket->status }}</span>
                                            @else
                                                <span class="label label-danger">{{ $ticket->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $ticket->updated_at }}</td>
                                        <td>
                                            @if ($ticket->status === 'Open')
                                                <a href="{{ url('tickets/' . $ticket->ticket_id) }}"
                                                    class="btn btn-primary">Comment</a>

                                                <form action="{{ url('admin/close_ticket/' . $ticket->ticket_id) }}"
                                                    method="POST">
                                                    {!! csrf_field() !!}
                                                    <button type="submit" class="btn btn-danger">Close</button>
                                                </form>
                                            @endif
                                        </td>
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
</x-app-layout>
