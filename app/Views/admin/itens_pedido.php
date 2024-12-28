<?php $this->extend('layout') ?>

<?php $this->section('content') ?>

<?php 
$itens = $itens ?? []; 
?>

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Itens do Pedido</h1>

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">Produto</th>
                <th class="px-4 py-2 text-left">Quantidade</th>
                <th class="px-4 py-2 text-left">Preço Unitário</th>
                <th class="px-4 py-2 text-left">Subtotal</th>
                <th class="px-4 py-2 text-left">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($itens)): ?>
                <?php foreach ($itens as $item): ?>
                    <tr>
                        <td class="border px-4 py-2"><?= esc($item['nome_produto']) ?></td>
                        <td class="border px-4 py-2"><?= esc($item['quantidade']) ?></td>
                        <td class="border px-4 py-2"><?= esc(number_format($item['preco_unitario'], 2, ',', '.')) ?></td>
                        <td class="border px-4 py-2"><?= esc(number_format($item['subtotal'], 2, ',', '.')) ?></td>
                        <td class="border px-4 py-2">


                            <a href="<?= base_url("admin/item-pedido/editar/{$item['id_item']}") ?>" class="text-blue-500 hover:text-blue-700">Editar</a> |
                            <a href="<?= base_url("admin/item-pedido/deletar/{$item['id_item']}") ?>" 
                               class="text-red-500 hover:text-red-700" 
                               onclick="return confirm('Tem certeza que deseja excluir este item?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center py-4">Nenhum item encontrado para este pedido.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="mt-4">
        <a href="<?= base_url("admin/item-pedido/criar/{$id_pedido}") ?>" 
           class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-700">Adicionar Novo Item</a>
    </div>
</div>

<?php $this->endSection() ?>