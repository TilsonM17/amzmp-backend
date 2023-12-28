<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Cliente;
use App\Helpers\ValidationClient;
use App\Models\Client;

class ClientController extends BaseController
{
    use ValidationClient;

    public function listAll()
    {
        $clientes = (new Client())->select('cliente.id, cliente.nome, cliente.email, cliente_telefone.telefone, cliente_endereco.cep ,cliente_endereco.localidade, cliente_endereco.bairro')
            ->join('cliente_telefone', 'cliente_telefone.cliente_id = cliente.id', 'left')
            ->join('cliente_endereco', 'cliente_endereco.cliente_id = cliente.id', 'left')
            ->get()
            ->getResultArray();
        
        return view('client/list_all',['clients' => $clientes]);
    }

    public function createClient()
    {
        return view('client/create_client');
    }

    public function createClientSubmit()
    {
        if (!$this->validateCreateCostumer()) {
            return redirect()->route('create_client')->with('errors', $this->validator->getErrors());
        }

        if (!(new Client)->createClient($this->request->getPost())) {
            echo "Errado";
        }

        return redirect()->route('list_all')->with('success', 'Novo cliente criado com sucesso');
    }
}
