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

// Form cadastro pessoa fisica-juridica
const divPFisico = document.getElementById('div-pessoa-fisica');
const divPJuridica = document.getElementById('div-pessoa-juridica');
const rdFisico = document.getElementById('rdFisico');
const rdJuridico = document.getElementById('rdJuridico');

rdFisico.addEventListener('click', function () {
    divPFisico.classList.remove('hidden');
    divPJuridica.classList.add('hidden');
});
rdJuridico.addEventListener('click', function () {
    divPFisico.classList.add('hidden');
    divPJuridica.classList.remove('hidden');
});
