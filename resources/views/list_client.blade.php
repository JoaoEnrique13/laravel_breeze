<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listar Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- MENSAGEM DE CLIENTE APAGADO --}}
            @if(session()->has('client-delete-success'))
                <div class="alert alert-success alert-dismissible alert-account-create fade show" role="alert" style="height: 60px; width: 100%; margin: 0 auto; margin-top: 20px; background: #a3cfbb; border-radius: 5px; padding: 20px; margin-top: -20px; margin-bottom: 10px;">
                <strong>Cliente apagado!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                </div>
            @endif

            {{-- MENSAGEM DE CLIENTE CRIADO --}}
            @if(session()->has('client-create-success'))
                <div class="alert alert-success alert-dismissible alert-account-create fade show" role="alert" style="height: 60px; width: 100%; margin: 0 auto; margin-top: 20px; background: #a3cfbb; border-radius: 5px; padding: 20px; margin-top: -20px; margin-bottom: 10px;">
                <strong>Cliente cadastrado!</strong> Confira todos os clientes.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                </div>
            @endif

            {{-- MENSAGEM DE CLIENTE EDITADO --}}
            @if(session()->has('client-edit-success'))
                <div class="alert alert-success alert-dismissible alert-account-create fade show" role="alert" style="height: 60px; width: 100%; margin: 0 auto; margin-top: 20px; background: #a3cfbb; border-radius: 5px; padding: 20px; margin-top: -20px; margin-bottom: 10px;">
                <strong>Cliente editado com sucesso!</strong> Confira todos os clientes.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    
                    @if ($clients != '[]')
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Bairro</th>
                            <th scope="col">CEP</th>
                            <th scope="col">Cidade</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{$client->id}}</td>
                                    <td>{{$client->name}}</td>
                                    <td>{{$client->address}}</td>
                                    <td>{{$client->neighborhood}}</td>
                                    <td>{{$client->zip_code}}</td>
                                    <td>{{$client->city}}</td>
                                    <td>{{$client->state}}</td>
                                    <td>
                                        <a href="{{ route('client.delete', ['id' => $client->id]) }}" class="btn btn-excluir" onclick="event.preventDefault(); if (confirm('Tem certeza que deseja excluir este cliente?')) { window.location.href = '{{ route('client.delete', ['id' => $client->id]) }}'; }">
                                            Excluir
                                        </a> &nbsp;
                                        <a href="{{ route('client.edit', ['id' => $client->id]) }}" class="btn btn-editar">Editar</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>

                    @else
                      Nenhum cliente cadastrado

                    @endif

                      <style>
                        .table{
                            width: 100%;
                        }

                        tr{
                            border: 1px solid #d3d3d3;
                        }

                        th, td{
                            padding: 10px 10px;
                            border: 1px solid #d3d3d3;
                        }

                        .col, tr{
                            text-align: left!important;
                        }

                        .btn{
                            padding: 5px 20px;
                            border: 1px solid transparent;
                            border-radius: 4px;
                            font-size: 15px;
                            transition: 0.5s;
                            cursor: pointer;
                        }

                        .btn-excluir{
                            background: rgb(184, 13, 13);
                            color: #fff;
                        }

                        .btn-excluir:hover{
                            background: transparent;
                            border-color: rgb(184, 13, 13);
                            color: #b80d0d;
                        }

                        .btn-editar{
                            background: #002060;
                            color: #fff;
                        }

                        .btn-editar:hover{
                            background: transparent;
                            border-color: #002060;
                            color: #002060;
                        }
                      </style>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
