<?php $this->extend('layout') ?>

<?php $this->section('content') ?>

<div class="flex items-start justify-center h-screen bg-gray-100">
  <div class="p-8 rounded-lg w-96 mt-12">
    <h2 class="text-2xl font-bold mb-6 text-center">Esqueceu sua senha?</h2>
    <p class="text-sm text-gray-600 text-center mb-4">
      Insira o seu e-mail abaixo e enviaremos um link para redefinir sua senha.
    </p>
    
    <form action="<?= base_url('esqueci-senha') ?>" method="post">
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
        <input type="email" id="email" name="email" required
          class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <button type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
        Enviar link de recuperação
      </button>
      
      <?php if (session()->getFlashdata('success')): ?>
        <p class="text-green-500 mt-4">
          <?= session()->getFlashdata('success') ?>
        </p>
      <?php endif; ?>

      <?php if (session()->getFlashdata('error')): ?>
        <p class="text-red-500 mt-4">
          <?= session()->getFlashdata('error') ?>
        </p>
      <?php endif; ?>
    </form>

    <div class="mt-6 text-center">
      <a href="<?= base_url('login') ?>" class="text-blue-600 hover:underline text-sm">
        Voltar para o login
      </a>
    </div>
  </div>
</div>

<?php $this->endSection() ?>
