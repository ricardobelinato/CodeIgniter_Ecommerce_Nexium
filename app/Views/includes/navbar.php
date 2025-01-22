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
        <button id="carrinho-btn" type="button" class="inline-flex items-center justify-center p-2 text-gray-400 hover:text-white">
          <div class="hidden sm:block p-2">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
              <path fill="#ffffff" d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
            </svg>
          </div>
        </button>

        <!-- Ícone de perfil que muda conforme login -->
        <div class="relative ml-3">
          <span class="sr-only">Open user menu</span>

          <!-- Verifica se o usuário está logado -->
          <?php if (session()->get('logged_in')): ?>
            <!-- Ícone de Dashboard (admin) -->
            <a href="<?= base_url('dashboard') ?>">
              <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="#ffffff" d="M424 0C442.5 0 456 13.5 456 30.8V60.8C456 73.4 443.4 82.8 434.4 86.3L240 137.3V249.1C240 265.6 232.3 278.9 221.1 278.9C210.8 278.9 203.1 265.6 203.1 249.1V137.3L77.6 86.3C68.6 82.8 56 73.4 56 60.8V30.8C56 13.5 69.5 0 88 0H424z"></path>
              </svg>
            </a>

            <!-- Ícone de Logout -->
            <a href="<?= base_url('logout') ?>">
              <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="#ffffff" d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
              </svg>
            </a>

          <?php else: ?>
            <!-- Se o usuário não estiver logado, mostra o ícone de login -->
            <a href="<?= base_url('login') ?>">
              <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="#ffffff" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512h172.6c16.3 0 29.7-13.3 29.7-29.7V369.9c0-16.3-13.3-29.7-29.7-29.7H92.3c-16.3 0-29.7 13.3-29.7 29.7v82.4c0 16.3 13.3 29.7 29.7 29.7h128.9z" />
              </svg>
            </a>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>




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