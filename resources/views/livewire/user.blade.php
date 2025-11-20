<div>
   <h1>Usuários</h1>

   <input type="text" wire:model="name" placeholder="Seu nome...">
   <input type="text" wire:model="email" placeholder="Seu email...">
   <input type="password" wire:model="password" placeholder="Seu nome...">
<div class="overflow-x-auto">
  <table class="min-w-full table-auto">
    <thead class="bg-gray-100">
      <tr>
        <th class="px-4 py-2 text-left">Nome</th>
        <th class="px-4 py-2 text-left">Idade</th>
        <th class="px-4 py-2 text-left">Cidade</th>
      </tr>
    </thead>
    <tbody>
      <tr class="border-t">
        <td class="px-4 py-2">João</td>
        <td class="px-4 py-2">25</td>
        <td class="px-4 py-2">São Paulo</td>
      </tr>
      <tr class="bg-gray-50 border-t">
        <td class="px-4 py-2">Maria</td>
        <td class="px-4 py-2">30</td>
        <td class="px-4 py-2">Rio de Janeiro</td>
      </tr>
      <tr class="border-t">
        <td class="px-4 py-2">Lucas</td>
        <td class="px-4 py-2">22</td>
        <td class="px-4 py-2">Belo Horizonte</td>
      </tr>
    </tbody>
  </table>
</div>
</div>
