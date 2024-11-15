<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class AuthController extends Controller
{
    // Funções relacionadas à autenticação
    public function login()
    {
        helper(['form', 'url']);
        echo view('login');
    }

    public function authenticate()
    {
        $session = session();
        $userModel = new UserModel();

        $identifier = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->getUserByEmailOrCpf($identifier);

        if ($user && password_verify($password, $user['senha'])) {
            $sessionData = [
                'id' => $user['id'],
                'email' => $user['email'],
                'is_adm' => $user['is_adm'],
                'logged_in' => true
            ];
            $session->set($sessionData);

            if ($user['is_adm']) {
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->to('/hardware');
            }
        } else {
            $session->setFlashdata('error', 'Login ou senha inválidos');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    // Funções administrativas
    public function adminDashboard()
    {
        // Renderiza a página do painel administrativo
        return view('admin/dashboard');
    }

    public function esqueceuasenha()
    {
        if ($this->request->getMethod() === 'post') {
            $identifier = $this->request->getPost('email');

            // Verifica se o formato do e-mail ou CPF é válido
            if (!filter_var($identifier, FILTER_VALIDATE_EMAIL) && !preg_match('/^\d{11}$/', $identifier)) {
                session()->setFlashdata('error', 'Informe um e-mail válido ou CPF com 11 dígitos.');
                return redirect()->to('/esqueceuasenha');
            }

            // Usa o método já criado no UserModel para buscar o usuário
            $userModel = new \App\Models\UserModel();
            $user = $userModel->getUserByEmailOrCpf($identifier);

            if ($user) {
                // Geração do token de recuperação (aqui você pode usar algum tipo de hash único)
                $token = bin2hex(random_bytes(50));

                // Chama a função para enviar o e-mail de recuperação
                if ($this->enviarEmailRecuperacao($user['email'], $token)) {
                    session()->setFlashdata('success', 'Link de recuperação enviado para o e-mail informado.');
                } else {
                    session()->setFlashdata('error', 'Erro ao enviar o link de recuperação. Tente novamente.');
                }
            } else {
                session()->setFlashdata('error', 'E-mail ou CPF não encontrado.');
            }

            return redirect()->to('/esqueceuasenha');
        }

        return view('esqueceuasenha');
    }

    private function enviarEmailRecuperacao($email, $token)
    {
        $mail = new PHPMailer(true);

        try {
            // Configurações do servidor SMTP
            $mail->isSMTP();                                            // Envia por SMTP
            $mail->Host       = 'smtp.seudominio.com';                    // Endereço do servidor SMTP
            $mail->SMTPAuth   = true;                                     // Ativa autenticação SMTP
            $mail->Username   = 'seuemail@seudominio.com';                // Seu e-mail de envio
            $mail->Password   = 'suasenha';                               // Sua senha de e-mail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           // TLS criptografado
            $mail->Port       = 587;                                      // Porta do servidor SMTP

            // Remetente
            $mail->setFrom('seuemail@seudominio.com', 'Nexium');           // E-mail e nome do remetente

            // Destinatário
            $mail->addAddress($email);                                    // E-mail do destinatário

            // Conteúdo do e-mail
            $mail->isHTML(true);                                           // Define o formato como HTML
            $mail->Subject = 'Recuperação de Senha';
            $mail->Body    = "Olá!<br><br>Recebemos uma solicitação para a recuperação de sua senha. Clique no link abaixo para redefinir sua senha:<br><br><a href='" . base_url('nova-senha/' . $token) . "'>Redefinir Senha</a><br><br>Se você não solicitou essa recuperação, por favor, ignore este e-mail.";

            // Envia o e-mail
            $mail->send();

            return true;
        } catch (Exception $e) {
            // Se falhar, captura o erro e retorna false
            return false;
        }
    }
}
