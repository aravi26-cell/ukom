<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Services\ProfilService;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    protected $profilService;
    public function __construct()
    {
        $this->profilService = new ProfilService();
    }

    public function index()
    {
        return view('customer.profil.index');
    }

    public function update(Request $request)
    {
        
    }
}