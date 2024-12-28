<?php 

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class EsqueciSenhaController extends Controller
{
    public function index()
    {
        return view('esqueci_senha');
    }

    public function enviarLinkRecuperacao()
    {
        $emailInput = $this->request->getPost('email');
        $userModel = new UserModel();

        $user = $userModel->where('email', $emailInput)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'E-mail não encontrado.');
        }

        $token = bin2hex(random_bytes(50));
        $userModel->update($user['id'], [
            'reset_token' => $token,
            'token_expires' => date('Y-m-d H:i:s', strtotime('+1 hour'))
        ]);

        $recuperacaoUrl = base_url("recuperar-senha/{$token}");

        $email = \Config\Services::email();

        $email->setTo($user['email']);
        $email->setFrom('ricbelinato@gmail.com', 'Sua Loja');
        $email->setSubject('Redefinição de Senha');
        $email->setMessage("Olá, <br><br> Clique no link abaixo para redefinir sua senha:<br><a href='{$recuperacaoUrl}'>{$recuperacaoUrl}</a><br><br> Este link expira em 1 hora.");

        if ($email->send()) {
            return redirect()->back()->with('success', 'Link de recuperação enviado para o seu e-mail.');
        } else {
            log_message('error', $email->printDebugger(['headers']));
            return redirect()->back()->with('error', 'Erro ao enviar o e-mail. Tente novamente mais tarde.');
        }
    }
}
