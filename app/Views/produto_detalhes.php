<?php $this->extend('layout') ?>

<?php $this->section('content') ?>

<div class="bg-white">
    <div class="pt-6">
        <nav aria-label="Breadcrumb">
            <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <li>
                    <a href="<?= base_url('/') ?>" class="mr-2 text-sm font-medium text-gray-900">Home</a>
                </li>
                <li class="text-sm">
                    <span class="font-medium text-gray-500"><?= esc($produto['nome_produto']) ?></span>
                </li>
            </ol>
        </nav>

        <div class="mx-auto mt-6 max-w-2xl lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8">
            <img src="<?= base_url('images/product/' . $produto['id_produto'] . '.webp') ?>" alt="<?= esc($produto['nome_produto']) ?>" class="rounded-lg object-cover lg:h-full">
        </div>

        <div class="mx-auto max-w-2xl px-4 py-6 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-gray-900"><?= esc($produto['nome_produto']) ?></h1>
                <p class="mt-4 text-gray-700"><?= nl2br(esc($produto['descricao'])) ?></p>
                <p class="mt-4 text-gray-500"><?= nl2br(esc($produto['informacoes_tecnicas'])) ?></p>
            </div>
            <div class="mt-6 lg:mt-0">
                <p class="text-3xl font-bold text-gray-900">R$ <?= number_format($produto['valor'], 2, ',', '.') ?></p>
                <?php if ($produto['valor_sem_desconto'] > $produto['valor']): ?>
                    <p class="text-sm text-gray-500"><s>R$ <?= number_format($produto['valor_sem_desconto'], 2, ',', '.') ?></s></p>
                <?php endif; ?>
                <button id="add-to-cart" data-id="<?= esc($produto['id_produto']) ?>" data-name="<?= esc($produto['nome_produto']) ?>" data-price="<?= esc($produto['valor']) ?>" type="button" class="bg-blue-800 w-full rounded-md text-white py-2 mt-4">Adicionar ao carrinho</button>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection() ?>