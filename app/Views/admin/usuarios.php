<?php $this->extend('layout') ?>

<?php $this->section('content') ?>

<body class="bg-gray-100">

  <div class="container mx-auto p-6 pb-96">
    <h1 class="text-3xl font-bold text-center mb-6">Usuários</h1>

    <a href="<?= base_url('admin/dashboard') ?>" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 transition mr-2">
      Voltar para o Dashboard
    </a>

    <button id="createUserBtn" class="bg-green-500 text-white p-2 rounded-md hover:bg-green-600 transition mt-4">
      Criar Novo Usuário
    </button>

    <div class="overflow-x-auto mt-6">
      <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-md">
        <thead class="bg-gray-200">
          <tr>
            <th class="py-2 px-4 text-left">ID</th>
            <th class="py-2 px-4 text-left">Nome</th>
            <th class="py-2 px-4 text-left">Email</th>
            <th class="py-2 px-4 text-left">Telefone</th>
            <th class="py-2 px-4 text-left">Administrador</th>
            <th class="py-2 px-4 text-left">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($usuarios as $usuario): ?>
            <tr>
              <td class="py-2 px-4"><?= $usuario['id'] ?></td>
              <td class="py-2 px-4"><?= esc($usuario['nome_completo']) ?></td>
              <td class="py-2 px-4"><?= esc($usuario['email']) ?></td>
              <td class="py-2 px-4"><?= esc($usuario['celular']) ?></td>
              <td class="py-2 px-4"><?= $usuario['is_adm'] ? 'Sim' : 'Não' ?></td>
              <td class="py-2 px-4">
                <button class="bg-yellow-500 text-white p-2 rounded-md hover:bg-yellow-600 transition ml-2 editUserBtn" data-id="<?= $usuario['id'] ?>" data-nome="<?= esc($usuario['nome_completo']) ?>" data-email="<?= esc($usuario['email']) ?>" data-celular="<?= esc($usuario['celular']) ?>" data-is_adm="<?= $usuario['is_adm'] ?>">
                  Editar
                </button>
                <a href="<?= base_url('admin/usuarios/deletar/' . $usuario['id']) ?>" class="bg-red-500 text-white p-2 rounded-md hover:bg-red-600 transition ml-2" onclick="return confirm('Tem certeza que deseja excluir?')">
                  Deletar
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>

  <div id="createUserPopup" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-md shadow-lg w-96">
      <h2 class="text-2xl font-bold mb-4">Adicionar Novo Usuário</h2>
      <form action="<?= base_url('admin/usuarios/criar') ?>" method="POST">
        <div class="mb-4">
          <label for="nome_completo" class="block text-sm font-medium text-gray-700">Nome Completo</label>
          <input type="text" name="nome_completo" id="nome_completo" required class="mt-2 p-2 w-full border border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" name="email" id="email" required class="mt-2 p-2 w-full border border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="celular" class="block text-sm font-medium text-gray-700">Celular</label>
          <input type="text" name="celular" id="celular" required class="mt-2 p-2 w-full border border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="is_adm" class="block text-sm font-medium text-gray-700">Administrador</label>
          <select name="is_adm" id="is_adm" class="mt-2 p-2 w-full border border-gray-300 rounded-md">
            <option value="0">Não</option>
            <option value="1">Sim</option>
          </select>
        </div>
        <div class="flex justify-between mt-6">
          <button type="button" id="closePopup" class="bg-gray-500 text-white p-2 rounded-md hover:bg-gray-600">
            Fechar
          </button>
          <button type="submit" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">
            Criar Usuário
          </button>
        </div>
      </form>
    </div>
  </div>

  <div id="editUserPopup" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-md shadow-lg w-96">
      <h2 class="text-2xl font-bold mb-4">Editar Usuário</h2>
      <form action="<?= base_url('admin/usuarios/atualizar/' . $usuario['id']) ?>" method="POST" id="editUserForm">

        <input type="hidden" name="id" id="editUserId">
        <div class="mb-4">
          <label for="editNomeCompleto" class="block text-sm font-medium text-gray-700">Nome Completo</label>
          <input type="text" name="nome_completo" id="editNomeCompleto" required class="mt-2 p-2 w-full border border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="editEmail" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" name="email" id="editEmail" required class="mt-2 p-2 w-full border border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="editCelular" class="block text-sm font-medium text-gray-700">Celular</label>
          <input type="text" name="celular" id="editCelular" required class="mt-2 p-2 w-full border border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
          <label for="editIsAdm" class="block text-sm font-medium text-gray-700">Administrador</label>
          <select name="is_adm" id="editIsAdm" class="mt-2 p-2 w-full border border-gray-300 rounded-md">
            <option value="0">Não</option>
            <option value="1">Sim</option>
          </select>
        </div>
        <div class="flex justify-between mt-6">
          <button type="button" id="closeEditPopup" class="bg-gray-500 text-white p-2 rounded-md hover:bg-gray-600">
            Fechar
          </button>
          <button type="submit" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">
            Atualizar Usuário
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>
    document.getElementById('createUserBtn').addEventListener('click', function() {
      document.getElementById('createUserPopup').classList.remove('hidden');
    });

    document.getElementById('closePopup').addEventListener('click', function() {
      document.getElementById('createUserPopup').classList.add('hidden');
    });

    window.addEventListener('click', function(event) {
      if (event.target === document.getElementById('createUserPopup')) {
        document.getElementById('createUserPopup').classList.add('hidden');
      }
    });

    document.querySelectorAll('.editUserBtn').forEach(button => {
      button.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        const nome = this.getAttribute('data-nome');
        const email = this.getAttribute('data-email');
        const celular = this.getAttribute('data-celular');
        const isAdm = this.getAttribute('data-is_adm');

        document.getElementById('editUserId').value = id;
        document.getElementById('editNomeCompleto').value = nome;
        document.getElementById('editEmail').value = email;
        document.getElementById('editCelular').value = celular;
        document.getElementById('editIsAdm').value = isAdm;

        document.getElementById('editUserPopup').classList.remove('hidden');
      });
    });

    document.getElementById('closeEditPopup').addEventListener('click', function() {
      document.getElementById('editUserPopup').classList.add('hidden');
    });

    window.addEventListener('click', function(event) {
      if (event.target === document.getElementById('editUserPopup')) {
        document.getElementById('editUserPopup').classList.add('hidden');
      }
    });
  </script>

</body>

<?php $this->endSection() ?>