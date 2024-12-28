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

//adicionar ao carrinho
document.addEventListener('DOMContentLoaded', function () {
    // Elementos do Carrinho
    const cartIcon = document.getElementById('cart-icon');
    const cartPopup = document.getElementById('cart-popup');
    const cartItems = document.getElementById('cart-items');
    const cartCount = document.getElementById('cart-count');

    // Inicializa o carrinho vazio
    let cart = [];

    // Exibir ou ocultar o popup do carrinho
    if (cartIcon && cartPopup) {
        cartIcon.addEventListener('click', function () {
            cartPopup.classList.toggle('hidden');
        });
    }







    document.addEventListener('DOMContentLoaded', function () {
        // Elementos do Carrinho
        const cartIcon = document.getElementById('cart-icon');
        const cartPopup = document.getElementById('cart-popup');
        const cartItems = document.getElementById('cart-items');
        const cartCount = document.getElementById('cart-count');

        // Inicializa o carrinho vazio
        let cart = [];

        // Exibir ou ocultar o popup do carrinho
        if (cartIcon && cartPopup) {
            cartIcon.addEventListener('click', function () {
                cartPopup.classList.toggle('hidden');
            });
        }

        // Adicionar produto ao carrinho
        function addToCart(product) {
            cart.push(product); // Adiciona o produto ao carrinho

            // Atualiza o número de itens no carrinho, se o elemento existir
            if (cartCount) {
                cartCount.textContent = cart.length;
            }

            renderCart(); // Atualiza a visualização do carrinho
        }

        // Atualizar a visualização do carrinho
        function renderCart() {
            if (!cartItems) return; // Retorna caso o elemento não exista

            if (cart.length === 0) {
                cartItems.innerHTML = `<p class="text-gray-500">Seu carrinho está vazio.</p>`;
                return;
            }

            cartItems.innerHTML = cart.map(item => `
                <div class="flex justify-between items-center border-b py-2">
                    <div>
                        <h4 class="font-medium">${item.nome}</h4>
                        <p class="text-sm text-gray-500">R$ ${item.valor.toFixed(2).replace('.', ',')}</p>
                    </div>
                    <button class="text-red-500 text-sm" onclick="removeFromCart(${item.id})">Remover</button>
                </div>
            `).join('');
        }

        // Remover item do carrinho
        window.removeFromCart = function (id) {
            cart = cart.filter(item => item.id !== id);

            // Atualiza o número de itens no carrinho, se o elemento existir
            if (cartCount) {
                cartCount.textContent = cart.length;
            }

            renderCart();
        };

        // Vincular botão "Adicionar ao Carrinho"
        const addCartButton = document.getElementById('add-to-cart');
        if (addCartButton) {
            addCartButton.addEventListener('click', function () {
                const product = {
                    id: addCartButton.dataset.id,
                    nome: addCartButton.dataset.name,
                    valor: parseFloat(addCartButton.dataset.price)
                };

                addToCart(product);
            });
        }
    });




});
