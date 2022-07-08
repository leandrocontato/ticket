<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('new-ticket') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="panel panel-default">
                                <div class="panel-heading">Open New Ticket</div>
                                {{$errors}}
                                <div class="panel-body">
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <form class="form-horizontal" role="form" method="POST">
                                        {!! csrf_field() !!}
                                        <div>
                                            <x-label for="codigo" :value="__('Codigo')" />
                                            <x-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" :value="old('codigo')"
                                                required autofocus />
                                        </div>

                                        <div>
                                            <x-label for="ticket_id" :value="__('Ticket')" />
                                            <x-input id="ticket_id" class="block mt-1 w-full" type="text" name="ticket_id" :value="old('ticket_id')"
                                                required autofocus />
                                        </div>

                                        <div>
                                            <x-label for="cliente" :value="__('Cliente')" />
                                            <x-input id="cliente" class="block mt-1 w-full" type="text" name="cliente" :value="old('cliente')"
                                                required autofocus />
                                        </div>

                                        <div>
                                            <x-label for="email" :value="__('Email')" />
                                            <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')"
                                                required autofocus />
                                        </div>

                                        <div>
                                            <x-label for="telefone" :value="__('Telefone')" />
                                            <x-input id="telefone" class="block mt-1 w-full" type="text" name="telefone" :value="old('telefone')"
                                                required autofocus />
                                        </div>

                                        <div>
                                            <x-label for="assunto" :value="__('Assunto')" />
                                            <x-input id="assunto" class="block mt-1 w-full" type="text" name="assunto" :value="old('assunto')"
                                                required autofocus />
                                        </div>

                                        <div>
                                            <x-label for="descritivo" :value="__('Descritivo')" />
                                            <x-input id="descritivo" class="block mt-1 w-full" type="text" name="descritivo" :value="old('descritivo')"
                                                required autofocus />
                                        </div>

                                        <div>
                                            <x-label for="data" :value="__('Data')" />
                                            <x-input id="data" class="block mt-1 w-full" type="text" name="data" :value="old('data')"
                                                required autofocus />
                                        </div>

                                        <div>
                                            <x-label for="hora" :value="__('Hora')" />
                                            <x-input id="hora" class="block mt-1 w-full" type="text" name="hora" :value="old('hora')"
                                                required autofocus />
                                        </div>

                                        <div>
                                            <x-label for="abertura" :value="__('Abertura')" />
                                            <x-input id="abertura" class="block mt-1 w-full" type="text" name="abertura" :value="old('abertura')"
                                                required autofocus />
                                        </div>

                                        <div class="form-group{{ $errors->has('ticket_priority') ? ' has-error' : '' }}">
                                            <label for="ticket_priority" class="col-md-4 control-label">Priority</label>
                                            <div class="col-md-6">
                                                <select id="ticket_priority" type="" class="form-control"
                                                    name="ticket_priority">
                                                    <option value="">Select Priority</option>
                                                    <option value="low">Low</option>
                                                    <option value="medium">Medium</option>
                                                    <option value="high">High</option>
                                                </select>
                                                @if ($errors->has('ticket_priority'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('ticket_priority') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('categoria') ? ' has-error' : '' }}">
                                            <label for="categoria" class="col-md-4 control-label">Categoria</label>
                                            <div class="col-md-6">
                                                <select id="categoria" type="" class="form-control"
                                                    name="categoria">
                                                    <option value="">Select categoria</option>
                                                    <option value="duvida">Dúvida</option>
                                                    <option value="naoconformidade">Não Conformidade</option>
                                                    <option value="acesso">Acesso</option>
                                                    <option value="melhoria">Melhoria</option>
                                                </select>
                                                @if ($errors->has('categoria'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('categoria') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                            <label for="status" class="col-md-4 control-label">Status</label>
                                            <div class="col-md-6">
                                                <select id="status" type="" class="form-control"
                                                    name="status">
                                                    <option value="">Select Status</option>
                                                    <option value="aberto">Aberto</option>
                                                    <option value="fechado">Fechado</option>
                                                </select>
                                                @if ($errors->has('status'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('status') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-ticket">Open Ticket</i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
