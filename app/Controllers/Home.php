<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }
    public function login(): string
    {
        return view('login');
    }
    public function cadastrar(): string
    {
        return view('cadastrar');
    }
    public function hardware(): string
    {
        return view('produtos/hardware');
    }
    public function perifericos(): string
    {
        return view('produtos/perifericos');
    }
    public function cadeiras(): string
    {
        return view('produtos/cadeiras');
    }
    public function monitores(): string
    {
        return view('produtos/monitores');
    }
    public function computadores(): string
    {
        return view('produtos/computadores');
    }
    public function notebooks(): string
    {
        return view('produtos/notebooks');
    }
}
