# Eccomerce Nexium, desenvolvido em Codeigniter/PHP

Nexium é um sistema de e-commerce desenvolvido utilizando o framework CodeIgniter com PHP, projetado para oferecer uma experiência de usuário responsiva e moderna. O projeto segue a arquitetura Model-View-Controller (MVC), garantindo uma separação clara entre lógica, interface e dados.

## 🚀 Tecnologias e Ferramentas Utilizadas
> **CodeIgniter (PHP):** Framework para desenvolvimento ágil com suporte a MVC. <br>
> **MySQL:** Banco de dados relacional para armazenamento eficiente e escalável. <br>
> **Tailwind CSS:** Framework de design moderno para estilização responsiva e consistente. <br>
> **JavaScript:** Interatividade e dinamicidade na interface do usuário. <br>
> **HTML5 e CSS3:** Estrutura e estilos básicos.

<br>

## 🎯 Funcionalidades
> Navegação e exibição de produtos. <br>
> Carrinho de compras totalmente funcional. <br>
> Sistema de autenticação para usuários e administradores. <br>
> Painel administrativo para gerenciamento de produtos, categorias e pedidos. <br>
> Layout responsivo para diferentes dispositivos.

<br>

## 🖥️ Demonstração

<br>

## 🛠️ Configuração e Uso
1. Clone o repositório:
```bash
git clone https://github.com/ricardobelinato/codeigniter_ecommerce_nexium
```

2. Configure o banco de dados no arquivo .env localizado na raiz do projeto e, em seguida, execute as migrations para preparar o banco de dados:
```bash
php spark migrate
```

3. Instale as dependências:
```bash
composer install
```

4. Inicie o servidor local:
```bash
php spark serve
```

5. Acesse o projeto no navegador:
```bash
http://localhost:8080
```

<br>

## 📂 Estrutura do Projeto
<pre>
    application/
      ├── controllers/    # Lógica de controle
      ├── models/         # Lógica de dados
      └── views/          # Interface do usuário
    public/
      ├── images/         # Imagens do projeto
      ├── css/            # Arquivos CSS
      └── js/             # Arquivos JavaScript
</pre>
