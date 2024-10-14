<nav class="bg-gray-800">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <!-- Botão para o menu móvel -->
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <button id="menu-btn" type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <!-- Ícone do menu fechado -->
          <svg id="menu-open-icon" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!-- Ícone do menu aberto (oculto por padrão) -->
          <svg id="menu-close-icon" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Logo e links principais -->
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex flex-shrink-0 items-center">
          <a href="<?php echo base_url(); ?>">
            <img class="h-8 w-auto" src="<?= base_url('images/logo-nexium-2.png') ?>" alt="Your Company">
          </a>
        </div>
      </div>

      <!-- Seção de perfil/usuário -->
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0 space-x-6">
        <!-- Ícone de carrinho -->
        <button id="carrinho-btn" type="button" class="inline-flex items-center justify-center p-2 text-gray-400 hover:text-white" aria-controls="mobile-carrinho" aria-expanded="false">
          <!-- DESKTOP -->
          <div class="hidden sm:block p-2">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
              <path fill="#ffffff" d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
            </svg>
          </div>
          <!-- MOBILE -->
          <div class="block sm:hidden p-2">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
              <path fill="#ffffff" d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
            </svg>
          </div>
        </button>

        <span class="sr-only">View notifications</span>

        <!-- Ícone de perfil SVG substituído -->
        <div class="relative ml-3">
          <span class="sr-only">Open user menu</span>
          <!-- Novo ícone de perfil -->
          <a href="<?= base_url('login') ?>">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
              <path fill="#ffffff" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Barra de pesquisa para DESKTOP -->
  <!-- <div class="hidden sm:block">
    <div class="flex justify-center mt-4 mb-4">
      <input type="text" placeholder="Pesquisar" class="w-2/3 max-w-xl px-4 py-2 border-2 border-blue-800 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-800" />
    </div>
  </div> -->

  <!-- Barra de pesquisa para MOBILE -->
  <div class="block sm:hidden p-2">
    <div class="flex justify-center mt-2 mr-4 ml-4 mb-4">
      <input type="text" placeholder="Pesquisar" class="w-full max-w-md px-4 py-2 border-2 border-blue-800 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-800" />
    </div>
  </div>



  <!-- Submenu fixo abaixo da navbar principal -->
  <div class="hidden sm:block bg-blue-800 p-2">
    <div class="container mx-auto flex justify-center items-center space-x-8">
      <a href="<?php echo base_url('hardware'); ?>" class="text-white hover:text-gray-200">Hardware</a>
      <a href="<?php echo base_url('perifericos'); ?>" class="text-white hover:text-gray-200">Periféricos</a>
      <a href="<?php echo base_url('cadeiras'); ?>" class="text-white hover:text-gray-200">Cadeiras</a>
      <a href="<?php echo base_url('monitores'); ?>" class="text-white hover:text-gray-200">Monitores</a>
      <a href="<?php echo base_url('computadores'); ?>" class="text-white hover:text-gray-200">Computadores</a>
      <a href="<?php echo base_url('notebooks'); ?>" class="text-white hover:text-gray-200">Notebooks</a>
    </div>
  </div>

  <!-- Menu móvel (oculto por padrão) -->
  <div class="hidden sm:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2">
      <a href="<?php echo base_url('hardware'); ?>" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Hardware</a>
      <a href="<?php echo base_url('perifericos'); ?>" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Periféricos</a>
      <a href="<?php echo base_url('cadeiras'); ?>" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Cadeiras</a>
      <a href="<?php echo base_url('monitores'); ?>" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Monitores</a>
      <a href="<?php echo base_url('computadores'); ?>" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Computadores</a>
      <a href="<?php echo base_url('notebooks'); ?>" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Notebooks</a>
    </div>
  </div>
</nav>

<!-- Carrinho Modal (conteúdo oculto inicialmente) -->
<div id="carrinho-modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 hidden" style="z-index: 999;">
  <div class="relative w-full h-full flex items-center justify-center sm:w-1/3 sm:h-full sm:right-0 sm:fixed sm:inset-y-0 sm:left-auto bg-white">
    <!-- Botão para fechar o carrinho -->
    <button id="close-carrinho-btn" class="absolute top-4 right-4 text-gray-700">
      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
    <!-- Conteúdo do carrinho -->
    <div class="p-6">
      TESTE
    </div>
  </div>
</div>