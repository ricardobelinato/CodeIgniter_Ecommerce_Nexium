// Nav hamburguer menu
const menuBtn = document.getElementById('menu-btn');
const menuOpenIcon = document.getElementById('menu-open-icon');
const menuCloseIcon = document.getElementById('menu-close-icon');
const mobileMenu = document.getElementById('mobile-menu');

menuBtn.addEventListener('click', () => {
    menuOpenIcon.classList.toggle('hidden');
    menuCloseIcon.classList.toggle('hidden');
    mobileMenu.classList.toggle('hidden');
});

// Carrinho
const carrinhoBtn = document.getElementById('carrinho-btn');
const carrinhoModal = document.getElementById('carrinho-modal');
const closeCarrinhoBtn = document.getElementById('close-carrinho-btn');

carrinhoBtn.addEventListener('click', function () {
    carrinhoModal.classList.remove('hidden');
});

closeCarrinhoBtn.addEventListener('click', function () {
    carrinhoModal.classList.add('hidden');
});