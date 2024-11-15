<?php $this->extend('layout') ?>

<?php $this->section('content') ?>

<body class="bg-gray-100">

  <div class="container mx-auto p-6 pb-96">
    <h1 class="text-3xl font-bold text-center mb-6">Categorias</h1>

    <a href="<?= base_url('admin/dashboard') ?>" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 transition mr-2">
      Voltar para o Dashboard
    </a>

    <button id="createCategoryBtn" class="bg-green-500 text-white p-2 rounded-md hover:bg-green-600 transition mt-4">
      Criar Nova Categoria
    </button>

    <div class="overflow-x-auto mt-6">
      <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-md">
        <thead class="bg-gray-200">
          <tr>
            <th class="py-2 px-4 text-left">ID</th>
            <th class="py-2 px-4 text-left">Nome</th>
            <th class="py-2 px-4 text-left">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($categorias as $categoria): ?>
            <tr>
              <td class="py-2 px-4"><?= $categoria['id_categoria'] ?></td>
              <td class="py-2 px-4"><?= esc($categoria['nome_categoria']) ?></td>
              <td class="py-2 px-4">
                <button class="bg-yellow-500 text-white p-2 rounded-md hover:bg-yellow-600 transition ml-2 editCategoryBtn" data-id="<?= $categoria['id_categoria'] ?>" data-nome="<?= esc($categoria['nome_categoria']) ?>">
                  Editar
                </button>
                <a href="<?= base_url('admin/categorias/deletar/' . $categoria['id_categoria']) ?>" class="bg-red-500 text-white p-2 rounded-md hover:bg-red-600 transition ml-2" onclick="return confirm('Tem certeza que deseja excluir?')">
                  Deletar
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>

  <div id="createCategoryPopup" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-md shadow-lg w-96">
      <h2 class="text-2xl font-bold mb-4">Adicionar Nova Categoria</h2>
      <form action="<?= base_url('admin/categorias/criar') ?>" method="POST">
        <div class="mb-4">
          <label for="nome_categoria" class="block text-sm font-medium text-gray-700">Nome</label>
          <input type="text" name="nome_categoria" id="nome_categoria" required class="mt-2 p-2 w-full border border-gray-300 rounded-md">
        </div>
        <div class="flex justify-between mt-6">
          <button type="button" id="closeCategoryPopup" class="bg-gray-500 text-white p-2 rounded-md hover:bg-gray-600">
            Fechar
          </button>
          <button type="submit" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">
            Criar Categoria
          </button>
        </div>
      </form>
    </div>
  </div>

  <div id="editCategoryPopup" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-md shadow-lg w-96">
      <h2 class="text-2xl font-bold mb-4">Editar Categoria</h2>
      <form action="<?= base_url('admin/categorias/atualizar/' . $categoria['id_categoria']) ?>" method="POST" id="editCategoryForm">

        <input type="hidden" name="id_categoria" id="editCategoryId">
        <div class="mb-4">
          <label for="editNome_categoria" class="block text-sm font-medium text-gray-700">Nome</label>
          <input type="text" name="nome_categoria" id="editNome_categoria" required class="mt-2 p-2 w-full border border-gray-300 rounded-md">
        </div>
        <div class="flex justify-between mt-6">
          <button type="button" id="closeEditCategoryPopup" class="bg-gray-500 text-white p-2 rounded-md hover:bg-gray-600">
            Fechar
          </button>
          <button type="submit" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">
            Atualizar Categoria
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>
    document.getElementById('createCategoryBtn').addEventListener('click', function() {
      document.getElementById('createCategoryPopup').classList.remove('hidden');
    });

    document.getElementById('closeCategoryPopup').addEventListener('click', function() {
      document.getElementById('createCategoryPopup').classList.add('hidden');
    });

    window.addEventListener('click', function(event) {
      if (event.target === document.getElementById('createCategoryPopup')) {
        document.getElementById('createCategoryPopup').classList.add('hidden');
      }
    });

    document.querySelectorAll('.editCategoryBtn').forEach(button => {
      button.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        const nome = this.getAttribute('data-nome');

        document.getElementById('editCategoryId').value = id;
        document.getElementById('editNome_categoria').value = nome;

        document.getElementById('editCategoryPopup').classList.remove('hidden');
      });
    });

    document.getElementById('closeEditCategoryPopup').addEventListener('click', function() {
      document.getElementById('editCategoryPopup').classList.add('hidden');
    });

    window.addEventListener('click', function(event) {
      if (event.target === document.getElementById('editCategoryPopup')) {
        document.getElementById('editCategoryPopup').classList.add('hidden');
      }
    });
  </script>

</body>

<?php $this->endSection() ?>
