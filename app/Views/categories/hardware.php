<?php $this->extend('layout') ?>

<?php $this->section('content') ?>

<div>
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h2 class="text-2xl font-bold tracking-tight text-gray-700"><?= esc($categoria_nome); ?></h2>

        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            <?php foreach ($produtos as $produto): ?>
                <div class="group relative card">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                        <img src="<?= base_url('images/product/' . $produto['id_produto'] . '.webp') ?>"
                             alt="<?= esc($produto['nome_produto']) ?>"
                             class="h-full w-full object-cover object-center lg:h-full lg:w-full"
                             height="500" width="500">
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="#">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    <?= esc($produto['nome_produto']) ?>
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">
                                <s>R$ <?= number_format($produto['valor_sem_desconto'], 2, ',', '.') ?></s>
                            </p>
                            <p class="text-sm font-medium text-gray-900">
                                <b>R$ <?= number_format($produto['valor'], 2, ',', '.') ?></b>
                            </p>
                        </div>
                    </div>
                    <button type="button" class="bg-blue-800 w-full rounded-md text-white py-2 mt-2.5">Comprar</button>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php $this->endSection() ?>
