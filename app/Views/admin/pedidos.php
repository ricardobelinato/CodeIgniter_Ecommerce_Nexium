<?php $this->extend('layout') ?>

<?php $this->section('content') ?>

<body class="bg-gray-100">

  <div class="container mx-auto p-6 pb-96">
    <h1 class="text-3xl font-bold text-center mb-6">Pedidos</h1>

    <a href="<?= base_url('admin/dashboard') ?>" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 transition mr-2">
      Voltar para o Dashboard
    </a>

    <button id="createPedidoBtn" class="bg-green-500 text-white p-2 rounded-md hover:bg-green-600 transition mt-4">
      Criar Novo Pedido
    </button>

    <div class="overflow-x-auto mt-6">
      <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-md">
        <thead class="bg-gray-200">
          <tr>
            <th class="py-2 px-4 text-left">ID</th>
            <th class="py-2 px-4 text-left">Usuário</th>
            <th class="py-2 px-4 text-left">Data</th>
            <th class="py-2 px-4 text-left">Total</th>
            <th class="py-2 px-4 text-left">Status</th>
            <th class="py-2 px-4 text-left">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($pedidos as $pedido): ?>
            <tr>
              <td class="py-2 px-4"><?= $pedido['id_pedido'] ?></td>
              <td class="py-2 px-4"><?= esc($pedido['nome_usuario']) ?></td>
              <td class="py-2 px-4"><?= esc($pedido['data_pedido']) ?></td>
              <td class="py-2 px-4">R$ <?= number_format($pedido['total'], 2, ',', '.') ?></td>
              <td class="py-2 px-4"><?= ucfirst($pedido['status']) ?></td>
              <td class="py-2 px-4">
                <button class="bg-yellow-500 text-white p-2 rounded-md hover:bg-yellow-600 transition ml-2 editPedidoBtn" 
                        data-id="<?= $pedido['id_pedido'] ?>" 
                        data-usuario="<?= esc($pedido['id_usuario']) ?>" 
                        data-total="<?= esc($pedido['total']) ?>" 
                        data-status="<?= esc($pedido['status']) ?>">
                  Editar
                </button>
                <a href="<?= base_url('admin/pedidos/deletar/' . $pedido['id_pedido']) ?>" 
                   class="bg-red-500 text-white p-2 rounded-md hover:bg-red-600 transition ml-2" 
                   onclick="return confirm('Tem certeza que deseja excluir?')">
                  Deletar
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>

  <div id="createPedidoPopup" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-md shadow-lg w-96">
      <h2 class="text-2xl font-bold mb-4">Adicionar Novo Pedido</h2>
      <form action="<?= base_url('admin/pedidos/criar') ?>" method="POST">
        <div class="mb-4">
          <label for="id_usuario" class="block text-sm font-medium text-gray-700">Usuário</label>
          <select name="id_usuario" id="id_usuario" class="mt-2 p-2 w-full border border-gray-300 rounded-md">
            <?php foreach ($usuarios as $usuario): ?>
              <option value="<?= $usuario['id'] ?>"><?= esc($usuario['nome_completo']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-4">
          <label for="total" class="block text-sm font-medium text-gray-700">Total</label>
          <input type="text" name="total" id="total" required class="mt-2 p-2 w-full border border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
          <select name="status" id="status" class="mt-2 p-2 w-full border border-gray-300 rounded-md">
            <option value="pendente">Pendente</option>
            <option value="processando">Processando</option>
            <option value="enviado">Enviado</option>
            <option value="concluido">Concluído</option>
            <option value="cancelado">Cancelado</option>
          </select>
        </div>
        <div class="flex justify-between mt-6">
          <button type="button" id="closeCreatePopup" class="bg-gray-500 text-white p-2 rounded-md hover:bg-gray-600">
            Fechar
          </button>
          <button type="submit" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">
            Criar Pedido
          </button>
        </div>
      </form>
    </div>
  </div>

  <div id="editPedidoPopup" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-md shadow-lg w-96">
      <h2 class="text-2xl font-bold mb-4">Editar Pedido</h2>
      <form action="<?= base_url('admin/pedidos/atualizar') ?>" method="POST">
        <input type="hidden" name="id_pedido" id="edit_id_pedido">
        <div class="mb-4">
          <label for="edit_id_usuario" class="block text-sm font-medium text-gray-700">Usuário</label>
          <select name="id_usuario" id="edit_id_usuario" class="mt-2 p-2 w-full border border-gray-300 rounded-md">
            <?php foreach ($usuarios as $usuario): ?>
              <option value="<?= $usuario['id'] ?>"><?= esc($usuario['nome_completo']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-4">
          <label for="edit_total" class="block text-sm font-medium text-gray-700">Total</label>
          <input type="text" name="total" id="edit_total" required class="mt-2 p-2 w-full border border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="edit_status" class="block text-sm font-medium text-gray-700">Status</label>
          <select name="status" id="edit_status" class="mt-2 p-2 w-full border border-gray-300 rounded-md">
            <option value="pendente">Pendente</option>
            <option value="processando">Processando</option>
            <option value="enviado">Enviado</option>
            <option value="concluido">Concluído</option>
            <option value="cancelado">Cancelado</option>
          </select>
        </div>
        <div class="flex justify-between mt-6">
          <button type="button" id="closeEditPopup" class="bg-gray-500 text-white p-2 rounded-md hover:bg-gray-600">
            Fechar
          </button>
          <button type="submit" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">
            Atualizar Pedido
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>
    document.getElementById('createPedidoBtn').addEventListener('click', function() {
      document.getElementById('createPedidoPopup').classList.remove('hidden');
    });

    document.getElementById('closeCreatePopup').addEventListener('click', function() {
      document.getElementById('createPedidoPopup').classList.add('hidden');
    });

    document.querySelectorAll('.editPedidoBtn').forEach(function(button) {
      button.addEventListener('click', function() {
        document.getElementById('editPedidoPopup').classList.remove('hidden');
        
        document.getElementById('edit_id_pedido').value = button.getAttribute('data-id');
        document.getElementById('edit_id_usuario').value = button.getAttribute('data-usuario');
        document.getElementById('edit_total').value = button.getAttribute('data-total');
        document.getElementById('edit_status').value = button.getAttribute('data-status');
      });
    });

    document.getElementById('closeEditPopup').addEventListener('click', function() {
      document.getElementById('editPedidoPopup').classList.add('hidden');
    });
  </script>

</body>

<?php $this->endSection() ?>
