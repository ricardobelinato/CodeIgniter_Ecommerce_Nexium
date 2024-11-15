<?php $this->extend('layout') ?>

<?php $this->section('content') ?>

<body class="bg-gray-100">

  <div class="container mx-auto p-6 pb-96">
    <h1 class="text-3xl font-bold text-center mb-6">Área Administrativa</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4">
      <a href="usuarios" class="bg-blue-500 text-white text-center p-4 rounded hover:bg-blue-600 transition">
        <h2 class="text-xl font-bold">Usuários</h2>
        <p>Gerencie os usuários do sistema</p>
      </a>

      <a href="categorias" class="bg-green-500 text-white text-center p-4 rounded hover:bg-green-600 transition">
        <h2 class="text-xl font-bold">Categorias</h2>
        <p>Gerencie as categorias de produtos</p>
      </a>

      <a href="produtos" class="bg-yellow-500 text-white text-center p-4 rounded hover:bg-yellow-600 transition">
        <h2 class="text-xl font-bold">Produtos</h2>
        <p>Gerencie os produtos</p>
      </a>

      <a href="pedidos" class="bg-red-500 text-white text-center p-4 rounded hover:bg-red-600 transition">
        <h2 class="text-xl font-bold">Pedidos</h2>
        <p>Visualize e gerencie os pedidos</p>
      </a>

      <a href="itens_pedido" class="bg-purple-500 text-white text-center p-4 rounded hover:bg-purple-600 transition">
        <h2 class="text-xl font-bold">Itens do Pedido</h2>
        <p>Gerencie os itens de cada pedido</p>
      </a>
    </div>
  </div>

</body>

<?php $this->endSection() ?>