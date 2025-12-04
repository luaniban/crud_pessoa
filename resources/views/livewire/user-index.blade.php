<div class="p-12">
    <h1 class="text-2xl font-bold mb-6">Usuários</h1>

    <div class="flex justify-end mb-4 gap-4">
        <a href="{{ route('export-json-enderecos') }}" >

            <button
            class="bg-yellow-700 hover:bg-yellow-800 transition text-white rounded-lg px-4 py-2 font-semibold shadow">
            Download JSON
            </button>
            </a>

        <a href="{{ route('export-csv-enderecos') }}" >

        <button
        class="bg-green-600 hover:bg-green-700 transition text-white rounded-lg px-4 py-2 font-semibold shadow">
        Download CSV
        </button>
        </a>

        <a href="{{ route('export-pdf-usuarios') }}" >

            <button
            class="bg-red-700 hover:bg-red-800 transition text-white rounded-lg px-4 py-2 font-semibold shadow">
            Download pdf
            </button>
            </a>

        <button
            wire:click="open_modal_create"
            class="bg-blue-600 hover:bg-blue-700 transition text-white rounded-lg px-4 py-2 font-semibold shadow"
        >
            + Criar Usuário
        </button>
    </div>


    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="px-6 py-3 text-left font-medium text-gray-700">Nome</th>
                    <th class="px-6 py-3 text-left font-medium text-gray-700">Email</th>
                    <th class="px-6 py-3 text-left font-medium text-gray-700">Ações</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-3">{{ $user->name }}</td>
                        <td class="px-6 py-3">{{ $user->email }}</td>
                        <td class="px-6 py-3 flex gap-2">

                            <button
                                wire:click="edit({{ $user->id }})"
                                class="bg-slate-800 hover:bg-slate-900 transition text-white rounded-md px-3 py-1 text-sm shadow"
                            >
                                Editar
                            </button>

                            <button
                                wire:click="delete({{ $user->id }})"
                                class="bg-red-600 hover:bg-red-700 transition text-white rounded-md px-3 py-1 text-sm shadow"
                            >
                                Excluir
                            </button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="{{ $modal_create ? 'flex' : 'hidden' }} fixed inset-0 bg-black/50 backdrop-blur-sm justify-center items-center p-4 ">
        <div class="bg-white w-full max-w-3xl rounded-xl shadow-lg p-6 animate-fade">

            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Criar Usuário</h2>
                <button wire:click="close_modal_create" class="text-gray-600 hover:text-gray-900">✖</button>
            </div>

            <div class="grid grid-cols-3 gap-4">

                <!-- NOME -->
                <div class="col-span-1">
                    <x-ts-input type="text" wire:model="name" placeholder="Nome"/>
                </div>

                <!-- EMAIL -->
                <div class="col-span-1">
                    <x-ts-input type="email" wire:model="email" placeholder="Email"/>
                </div>

                <!-- SENHA -->
                <div class="col-span-1">
                    <x-ts-input type="password" wire:model="password" placeholder="Senha"/>
                </div>


                <!-- ENDEREÇO -->
                <div class="col-span-3 mt-4">
                    <h1 class="font-bold mb-2">Endereço</h1>
                    <hr class="w-full mb-2">
                </div>

                <!-- RUA -->
                <div class="col-span-2">
                    <x-ts-input type="text" wire:model="rua" placeholder="Rua"/>
                </div>

                <!-- BAIRRO -->
                <div class="col-span-1">
                    <x-ts-input type="text" wire:model="bairro" placeholder="Bairro"/>
                </div>


                <!-- DOCUMENTO -->
                <div class="col-span-3 mt-4">
                    <h1 class="font-bold mb-2">Documento</h1>
                    <hr class="w-full mb-2">
                </div>

                <!-- CPF -->
                <div class="col-span-1">
                    <x-ts-input type="text" wire:model="cpf" placeholder="CPF"/>
                </div>

                <!-- RG -->
                <div class="col-span-1">
                    <x-ts-input type="text" wire:model="rg" placeholder="RG"/>
                </div>

                <!-- CNH -->
                <div class="col-span-1">
                    <x-ts-input type="text" wire:model="cnh" placeholder="CNH"/>
                </div>


                <!-- BOTÃO -->
                <div class="col-span-3 mt-4">
                    <button
                        wire:click="create"
                        class="w-full bg-blue-600 hover:bg-blue-700 transition text-white rounded-lg px-4 py-2 font-semibold shadow"
                    >
                        Criar Usuário
                    </button>
                </div>
            </div>

        </div>
    </div>





    <div class="{{ $modal_edit ? 'flex' : 'hidden' }} fixed inset-0 bg-black/50 backdrop-blur-sm justify-center items-center p-4">
        <div class="bg-white w-full max-w-3xl rounded-xl shadow-lg p-6 animate-fade">

            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Editar Usuário</h2>
                <button wire:click="close_modal_edit" class="text-gray-600 hover:text-gray-900">✖</button>
            </div>

            <div class="grid grid-cols-3 gap-4">

                <!-- NOME -->
                <div class="col-span-1">
                    <x-ts-input type="text" wire:model="name" placeholder="Nome"/>
                </div>

                <!-- EMAIL -->
                <div class="col-span-1">
                    <x-ts-input type="email" wire:model="email" placeholder="Email"/>
                </div>

                <!-- deixar a terceira coluna vazia (alinhamento com create) -->
                <div class="col-span-1"></div>


                <!-- ENDEREÇO -->
                <div class="col-span-3 mt-4">
                    <h1 class="font-bold mb-2">Endereço</h1>
                    <hr class="w-full mb-2">
                </div>

                <!-- RUA -->
                <div class="col-span-2">
                    <x-ts-input type="text" wire:model="rua" placeholder="Rua"/>
                </div>

                <!-- BAIRRO -->
                <div class="col-span-1">
                    <x-ts-input type="text" wire:model="bairro" placeholder="Bairro"/>
                </div>


                <!-- DOCUMENTO -->
                <div class="col-span-3 mt-4">
                    <h1 class="font-bold mb-2">Documento</h1>
                    <hr class="w-full mb-2">
                </div>

                <!-- CPF -->
                <div class="col-span-1">
                    <x-ts-input type="text" wire:model="cpf" placeholder="CPF"/>
                </div>

                <!-- RG -->
                <div class="col-span-1">
                    <x-ts-input type="text" wire:model="rg" placeholder="RG"/>
                </div>

                <!-- CNH -->
                <div class="col-span-1">
                    <x-ts-input type="text" wire:model="cnh" placeholder="CNH"/>
                </div>


                <!-- BOTÃO -->
                <div class="col-span-3 mt-4">
                    <button
                        wire:click="update"
                        class="w-full bg-blue-600 hover:bg-blue-700 transition text-white rounded-lg px-4 py-2 font-semibold shadow"
                    >
                        Atualizar Usuário
                    </button>
                </div>
            </div>

        </div>
    </div>


</div>
