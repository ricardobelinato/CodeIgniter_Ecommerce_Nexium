<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        $session = session();
        if (!$session->get('logged_in') || !$session->get('is_adm')) {
            return redirect()->to('/login');
        }

        return view('admin/dashboard');
    }
}
