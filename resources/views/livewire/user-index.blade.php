<div class="p-12">
    <h1 class="text-2xl font-bold mb-6">Usuários</h1>

   
    <div class="flex justify-end mb-4">
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

    <div class="{{ $modal_create ? 'flex' : 'hidden' }} fixed inset-0 bg-black/50 backdrop-blur-sm justify-center items-center p-4">
        <div class="bg-white w-full max-w-md rounded-xl shadow-lg p-6 animate-fade">

            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Criar Usuário</h2>
                <button wire:click="close_modal_create" class="text-gray-600 hover:text-gray-900">
                    ✖
                </button>
            </div>

            <div class="flex flex-col gap-4">
                <input type="text" wire:model="name" placeholder="Nome"
                    class="rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">

                <input type="email" wire:model="email" placeholder="Email"
                    class="rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">

                <input type="password" wire:model="password" placeholder="Senha"
                    class="rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">

                <button
                    wire:click="create"
                    class="bg-blue-600 hover:bg-blue-700 transition text-white rounded-lg px-4 py-2 font-semibold shadow"
                >
                    Criar Usuário
                </button>
            </div>

        </div>
    </div>


    <div class="{{ $modal_edit ? 'flex' : 'hidden' }} fixed inset-0 bg-black/50 backdrop-blur-sm justify-center items-center p-4">
        <div class="bg-white w-full max-w-md rounded-xl shadow-lg p-6 animate-fade">

            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Editar Usuário</h2>
                <button wire:click="close_modal_edit" class="text-gray-600 hover:text-gray-900">
                    ✖
                </button>
            </div>

            <div class="flex flex-col gap-4">
                <input type="text" wire:model="name" placeholder="Nome"
                    class="rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">

                <input type="email" wire:model="email" placeholder="Email"
                    class="rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">

                <button
                    wire:click="update"
                    class="bg-blue-600 hover:bg-blue-700 transition text-white rounded-lg px-4 py-2 font-semibold shadow"
                >
                    Atualizar Usuário
                </button>
            </div>

        </div>
    </div>
</div>
