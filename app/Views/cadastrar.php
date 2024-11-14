<?php $this->extend('layout') ?>

<?php $this->section('content') ?>

<div class="flex items-start justify-center pb-10 bg-gray-100">
  <div class="p-8 rounded-lg w-96 md:w-1/2 mt-12">
    <h2 class="text-2xl font-bold mb-6 text-center">Crie sua conta</h2>

    <form action="<?= base_url('cadastro/salvar') ?>" method="POST">
      <div id="div-pessoa-fisica" class="">
        <div class="mb-3 flex space-x-4">
          <div class="flex-1">
            <label for="nomeCompleto" class="block text-sm font-medium text-gray-700">Nome completo</label>
            <input type="text" id="nomeCompleto" name="nome" required
              class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>
          <div class="flex-1">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" required
              class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>
        </div>

        <div class="mb-3 flex space-x-4">
          <div class="flex-1">
            <label for="cpf" class="block text-sm font-medium text-gray-700">CPF</label>
            <input type="text" id="cpf" name="cpf" required
              class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>
          <div class="flex-1">
            <label for="dataNascimento" class="block text-sm font-medium text-gray-700">Data de Nascimento</label>
            <input type="date" id="dataNascimento" name="dataNascimento" required
              class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>
        </div>

        <div class="mb-3 flex space-x-4">
          <div class="flex-1">
            <label for="celular" class="block text-sm font-medium text-gray-700">Celular</label>
            <input type="tel" id="celular" name="celular" required
              class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>
          <div class="flex-1">
            <label for="genero" class="block text-sm font-medium text-gray-700">Gênero</label>
            <select id="genero" name="genero" required
              class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
              <option value="" disabled selected>Selecione</option>
              <option value="masculino">Masculino</option>
              <option value="feminino">Feminino</option>
              <option value="outro">Outro</option>
              <option value="naoInformar">Prefiro não informar</option>
            </select>
          </div>
        </div>

        <div class="mb-3">
          <label for="senha" class="block text-sm font-medium text-gray-700">Crie sua senha</label>
          <input type="password" id="senha" name="senha" required
            class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <div class="mb-3">
          <label for="confirmarSenha" class="block text-sm font-medium text-gray-700">Confirme sua senha</label>
          <input type="password" id="confirmarSenha" name="confirmarSenha" required
            class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
      </div>

      <button type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Criar
      </button>

      <?php if (session()->getFlashdata('success')): ?>
        <p class="text-green-500">
          <?= session()->getFlashdata('success') ?>
        </p>
      <?php endif; ?>

      <?php if (session()->getFlashdata('error')): ?>
        <p class="text-red-500">
          <?= session()->getFlashdata('error') ?>
        </p>
      <?php endif; ?>


      <div class="mb-4 mt-1">
        <p class="text-sm text-gray-600">Já possui cadastro? <a href="<?= base_url('login') ?>" class="text-blue-600 hover:underline">Entrar</a></p>
      </div>


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
              <path fill="#ffffff" d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.5 139.4 0 189.4 0 261.9c0 48.8 41.8 87.9 93.5 88.2 30.2 0 56.8-13.2 74.1-35.3 9.8 18.5 21.4 28.3 34.9 28.3 13.1 0 25.9-10.2 38.3-18.1 0 0 56.3-43.2 74.6-72.5 8.5-13.7 13.8-27.9 14.6-40.6zm-34.9 40.3c-23.2 37.3-45.8 69.5-61.2 89.5-13.2 16.2-19.9 19.3-27.1 19.3-7.6 0-14.6-4.4-20.2-8.8 8.2-12.5 16.4-23.7 24.9-35.7 22.2 2.8 34.5 10.3 53.3-18.8 11.1 21.6 8.8 24.1 7.7 29.8zm25.4-19.3z" />
            </svg>
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php $this->endSection() ?>