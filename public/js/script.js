// Nav hamburguer menu mobile
const menuBtn = document.getElementById('menu-btn');
const menuOpenIcon = document.getElementById('menu-open-icon');
const menuCloseIcon = document.getElementById('menu-close-icon');
const mobileMenu = document.getElementById('mobile-menu');

menuBtn.addEventListener('click', () => {
    menuOpenIcon.classList.toggle('hidden');
    menuCloseIcon.classList.toggle('hidden');
    mobileMenu.classList.toggle('hidden');
});



// Seleciona os elementos necessários
const carrinhoBtn = document.getElementById("carrinho-btn");
const carrinhoModal = document.getElementById("carrinho-modal");
const closeCarrinhoBtn = document.getElementById("close-carrinho-btn");

// Função para abrir o modal do carrinho
carrinhoBtn.addEventListener("click", () => {
  carrinhoModal.classList.remove("hidden"); // Remove a classe 'hidden'
});

// Função para fechar o modal do carrinho
closeCarrinhoBtn.addEventListener("click", () => {
  carrinhoModal.classList.add("hidden"); // Adiciona a classe 'hidden'
});

// Opcional: Fechar o modal ao clicar fora do conteúdo
carrinhoModal.addEventListener("click", (event) => {
  if (event.target === carrinhoModal) {
    carrinhoModal.classList.add("hidden");
  }
});