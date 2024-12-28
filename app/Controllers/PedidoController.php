<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PedidoModel;
use App\Models\UserModel;

class PedidoController extends BaseController
{
    protected $pedidoModel;

    public function __construct()
    {
        $this->pedidoModel = new PedidoModel();
    }

    public function index()
    {
        $data['pedidos'] = $this->pedidoModel
            ->select('pedidos.*, usuario.nome_completo as nome_usuario')
            ->join('usuario', 'pedidos.id_usuario = usuario.id')
            ->findAll();

        return view('admin/pedidos', $data);
    }

    public function criar()
    {
        $usuarioModel = new UserModel();
        $data['usuarios'] = $usuarioModel->findAll();
        return view('admin/pedidos_criar', $data);
    }


    public function salvar()
    {
        $this->pedidoModel->save([
            'id_usuario' => $this->request->getPost('id_usuario'),
            'total' => $this->request->getPost('total'),
            'status' => $this->request->getPost('status'),
            'data_pedido' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/admin/pedidos')->with('message', 'Pedido criado com sucesso!');
    }

    public function editar($id)
    {
        $data['pedido'] = $this->pedidoModel->find($id);

        if (!$data['pedido']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Pedido não encontrado: $id");
        }

        return view('admin/pedidos_editar', $data);
    }

    public function atualizar($id)
    {
        $this->pedidoModel->update($id, [
            'id_usuario' => $this->request->getPost('id_usuario'),
            'total' => $this->request->getPost('total'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/pedidos')->with('message', 'Pedido atualizado com sucesso!');
    }

    public function deletar($id)
    {
        // Deletar o pedido
        $this->pedidoModel->delete($id);

        return redirect()->to('/admin/pedidos')->with('message', 'Pedido excluído com sucesso!');
    }
}
