<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                        <form  method="POST" action="{{ route('client.update') }}">

                            {{-- ID DO USUARIO --}}
                                <x-text-input id="id" class="block mt-1 w-full" type="text" name="id" :value="$client->id" required autocomplete="off" style="display: none"/>

                            @csrf
                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$client->name" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                    
                            <!-- Endereco -->
                            <div class="mt-4">
                                <x-input-label for="address" :value="__('Endereço')" />
                                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="$client->address" required autocomplete="off" />
                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                            </div>

                            <!-- Bairro -->
                            <div class="mt-4">
                                <x-input-label for="neighborhood" :value="__('Bairro')" />
                                <x-text-input id="neighborhood" class="block mt-1 w-full" type="text" name="neighborhood" :value="$client->neighborhood" required autocomplete="off" />
                                <x-input-error :messages="$errors->get('neighborhood')" class="mt-2" />
                            </div>
                    
                            <!-- Cep -->
                            <div class="mt-4">
                                <x-input-label for="zip_code" :value="__('Cep')" />
                                <x-text-input id="zip_code" class="block mt-1 w-full" type="text" name="zip_code" :value="$client->zip_code" required autocomplete="off" />
                                <x-input-error :messages="$errors->get('zip_code')" class="mt-2" />
                            </div>

                            <!-- Cidade -->
                            <div class="mt-4">
                                <x-input-label for="city" :value="__('Cidade')" />
                                <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="$client->city" required autocomplete="off" />
                                <x-input-error :messages="$errors->get('city')" class="mt-2" />
                            </div>

                            <!-- Estado -->
                            <div class="mt-4">
                                <x-input-label for="state" :value="__('Estado')" />
                                <x-text-input id="state" class="block mt-1 w-full" type="text" name="state" :value="$client->state" required autocomplete="off" />
                                <x-input-error :messages="$errors->get('state')" class="mt-2" />
                            </div>
                    
                            <div class="flex items-center justify-end mt-4">
                    
                                <x-primary-button class="ml-4">
                                    {{ __('Editar') }}
                                </x-primary-button>
                            </div>
                        </form>
                    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
