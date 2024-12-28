<?php

namespace App\Controllers;

use App\Models\ItemPedidoModel;

class ItemPedidoController extends BaseController
{
    protected $itemPedidoModel;

    public function __construct()
    {
        $this->itemPedidoModel = new ItemPedidoModel();
    }

    // Exibir itens do pedido
    public function index($id_pedido)
    {
        $itens = $this->itemPedidoModel->getItensPorPedido($id_pedido);
        return view('admin/item_pedido/index', ['itens' => $itens, 'id_pedido' => $id_pedido]);
    }

    // Criar item do pedido
    public function criar($id_pedido)
    {
        return view('admin/item_pedido/criar', ['id_pedido' => $id_pedido]);
    }

    // Salvar item do pedido
    public function salvar($id_pedido)
    {
        $this->itemPedidoModel->save([
            'id_pedido' => $id_pedido,
            'id_produto' => $this->request->getPost('id_produto'),
            'quantidade' => $this->request->getPost('quantidade'),
            'preco_unitario' => $this->request->getPost('preco_unitario'),
        ]);

        return redirect()->to("/admin/itens-pedido/{$id_pedido}")->with('message', 'Item criado com sucesso!');
    }

    // Editar item do pedido
    public function editar($id_item)
    {
        $item = $this->itemPedidoModel->find($id_item);
        if (!$item) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Item não encontrado: $id_item");
        }

        return view('admin/item_pedido/editar', ['item' => $item]);
    }

    // Atualizar item do pedido
    public function atualizar($id_item)
    {
        $this->itemPedidoModel->update($id_item, [
            'id_produto' => $this->request->getPost('id_produto'),
            'quantidade' => $this->request->getPost('quantidade'),
            'preco_unitario' => $this->request->getPost('preco_unitario'),
        ]);

        $id_pedido = $this->request->getPost('id_pedido');
        return redirect()->to("/admin/itens-pedido/{$id_pedido}")->with('message', 'Item atualizado com sucesso!');
    }

    // Deletar item do pedido
    public function deletar($id_item)
    {
        $item = $this->itemPedidoModel->find($id_item);
        $id_pedido = $item['id_pedido'];

        $this->itemPedidoModel->delete($id_item);

        return redirect()->to("/admin/itens-pedido/{$id_pedido}")->with('message', 'Item excluído com sucesso!');
    }
}
