<?php $this->extend('layout') ?>

<?php $this->section('content') ?>

<body class="bg-gray-100">
  <div class="container mx-auto p-6 pb-96">
    <h1 class="text-3xl font-bold text-center mb-6">Produtos</h1>

    <button id="createProductBtn" class="bg-green-500 text-white p-2 rounded-md hover:bg-green-600 transition mb-4">
      Criar Novo Produto
    </button>

    <div class="overflow-x-auto">
      <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-md">
        <thead class="bg-gray-200">
          <tr>
            <th class="py-2 px-4 text-left">ID</th>
            <th class="py-2 px-4 text-left">Nome</th>
            <th class="py-2 px-4 text-left">Valor</th>
            <th class="py-2 px-4 text-left">Categoria</th>
            <th class="py-2 px-4 text-left">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($produtos as $produto): ?>
            <tr>
              <td class="py-2 px-4"><?= $produto['id_produto'] ?></td>
              <td class="py-2 px-4"><?= esc($produto['nome_produto']) ?></td>
              <td class="py-2 px-4"><?= esc($produto['valor']) ?></td>
              <td class="py-2 px-4"><?= esc($produto['id_categoria']) ?></td>
              <td class="py-2 px-4">
                <button class="bg-yellow-500 text-white p-2 rounded-md hover:bg-yellow-600 transition ml-2" onclick="openEditForm(<?= $produto['id_produto'] ?>)">
                  Editar
                </button>
                <a href="<?= base_url('admin/produtos/deletar/' . $produto['id_produto']) ?>" class="bg-red-500 text-white p-2 rounded-md hover:bg-red-600 transition ml-2" onclick="return confirm('Tem certeza que deseja excluir?')">
                  Deletar
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div id="productModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
      <div class="bg-white p-6 rounded-md shadow-md w-96">
        <h2 id="modalTitle" class="text-xl font-bold mb-4">Criar Produto</h2>
        
        <form id="productForm" action="<?= base_url('admin/produtos/salvar') ?>" method="POST">
          <input type="hidden" id="productId" name="id_produto">
          
          <div class="mb-4">
            <label for="nome_produto" class="block text-sm font-medium text-gray-700">Nome do Produto</label>
            <input type="text" name="nome_produto" id="nome_produto" required class="mt-2 p-2 w-full border border-gray-300 rounded-md">
          </div>

          <div class="mb-4">
            <label for="valor_sem_desconto" class="block text-sm font-medium text-gray-700">Valor Sem Desconto</label>
            <input type="text" name="valor_sem_desconto" id="valor_sem_desconto" required class="mt-2 p-2 w-full border border-gray-300 rounded-md">
          </div>

          <div class="mb-4">
            <label for="valor" class="block text-sm font-medium text-gray-700">Valor</label>
            <input type="text" name="valor" id="valor" required class="mt-2 p-2 w-full border border-gray-300 rounded-md">
          </div>

          <div class="mb-4">
            <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
            <textarea name="descricao" id="descricao" class="mt-2 p-2 w-full border border-gray-300 rounded-md"></textarea>
          </div>

          <div class="mb-4">
            <label for="informacoes_tecnicas" class="block text-sm font-medium text-gray-700">Informações Técnicas</label>
            <textarea name="informacoes_tecnicas" id="informacoes_tecnicas" class="mt-2 p-2 w-full border border-gray-300 rounded-md"></textarea>
          </div>

          <div class="mb-4">
            <label for="id_categoria" class="block text-sm font-medium text-gray-700">Categoria</label>
            <select name="id_categoria" id="id_categoria" required class="mt-2 p-2 w-full border border-gray-300 rounded-md">
              <?php foreach ($categorias as $categoria): ?>
                <option value="<?= $categoria['id_categoria'] ?>"><?= esc($categoria['nome_categoria']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="mb-4 text-right">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 transition">
              Salvar
            </button>
            <button type="button" id="cancelBtn" class="bg-gray-500 text-white p-2 rounded-md hover:bg-gray-600 transition ml-2" onclick="closeModal()">
              Cancelar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    function openEditForm(id) {
      if (id) {
        fetch('/admin/produtos/editar/' + id)
          .then(response => response.json())
          .then(data => {
            document.getElementById('productId').value = data.id_produto;
            document.getElementById('nome_produto').value = data.nome_produto;
            document.getElementById('valor_sem_desconto').value = data.valor_sem_desconto;
            document.getElementById('valor').value = data.valor;
            document.getElementById('descricao').value = data.descricao;
            document.getElementById('informacoes_tecnicas').value = data.informacoes_tecnicas;
            document.getElementById('id_categoria').value = data.id_categoria;
            document.getElementById('modalTitle').innerText = 'Editar Produto';
            document.getElementById('productForm').action = '/admin/produtos/atualizar/' + id;
          });
      } else {
        document.getElementById('productForm').reset();
        document.getElementById('modalTitle').innerText = 'Criar Produto';
        document.getElementById('productForm').action = '/admin/produtos/salvar';
      }

      document.getElementById('productModal').classList.remove('hidden');
    }

    function closeModal() {
      document.getElementById('productModal').classList.add('hidden');
    }
  </script>

<?php $this->endSection() ?>
