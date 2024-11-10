<?php $this->extend('layout') ?>

<?php $this->section('content') ?>

<div class="flex items-start justify-center h-screen bg-gray-100">
  <div class="p-8 rounded-lg w-96 mt-12">
    <h2 class="text-2xl font-bold mb-6 text-center">Acesse sua conta</h2>



    <form action="<?= base_url('login') ?>" method="post">
      <div class="mb-3">
        <label for="email" class="block text-sm font-medium text-gray-700">E-mail, CPF ou CNPJ</label>
        <input type="text" id="email" name="email" required
          class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div class="mb-1">
        <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
        <input type="password" id="password" name="password" required
          class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div class="mb-4">
        <a href="">
          <u>
            <p class="text-sm text-gray-600">Esqueceu a senha?</p>
          </u>
        </a>
      </div>

      <button type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Entrar
      </button>

      <?php if (session()->getFlashdata('error')): ?>
        <p class="text-red-500">
          <?= session()->getFlashdata('error') ?>
        </p>
      <?php endif; ?>

      <div class="mb-4 mt-1">
        <p class="text-sm text-gray-600">Novo na Nexium? <a href="<?= base_url('cadastrar') ?>" class="text-blue-600 hover:underline">Cadastre-se</a></p>
      </div>
    </form>

    <!-- Opções de login social -->
    <div class="mt-6 text-center">
      <div class="flex justify-center space-x-2 mt-2">

        <button class="flex items-center justify-center w-10 h-10 bg-blue-600 text-white rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
          <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="#ffffff" d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z" />
          </svg>
        </button>

        <button class="flex items-center justify-center w-10 h-10 bg-red-600 text-white rounded-full hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
          <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512">
            <path fill="#ffffff" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z" />
          </svg>
        </button>

        <button class="flex items-center justify-center w-10 h-10 bg-black text-white rounded-full hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-black">
          <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
            <path fill="#ffffff" d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</div>

<?php 
  // echo MD5(
  //   'senhaSegura123'
  // );
?>

<?php $this->endSection() ?>