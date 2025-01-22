<!-- Carrinho Modal -->
<div id="carrinho-modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 hidden" style="z-index: 999;">
  <div class="relative w-full h-full flex items-center justify-center sm:w-1/3 sm:h-full sm:right-0 sm:fixed sm:inset-y-0 sm:left-auto bg-white shadow-lg">
    <!-- Botão para fechar o carrinho -->
    <button id="close-carrinho-btn" class="absolute top-4 right-4 text-gray-700 hover:text-gray-900">
      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>

    <!-- Conteúdo do carrinho -->
    <div class="p-6 w-full">
      <h2 class="text-xl font-bold text-gray-800 mb-4">Meu Carrinho</h2>

      <!-- Lista de itens no carrinho -->
      <div id="cart-items" class="space-y-4">
        <p class="text-gray-500">Seu carrinho está vazio.</p>
      </div>

      <!-- Resumo e total -->
      <div id="cart-summary" class="mt-6 border-t pt-4 hidden">
        <div class="flex justify-between items-center">
          <span class="text-lg font-medium text-gray-800">Total:</span>
          <span id="cart-total" class="text-lg font-bold text-gray-900">R$ 0,00</span>
        </div>
        <button id="checkout-btn" class="mt-4 w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700">
          Finalizar Compra
        </button>
      </div>
    </div>
  </div>
</div>
