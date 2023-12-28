<?php

namespace App\Models;

use CodeIgniter\Model;

class Client extends Model
{
    protected $table            = 'cliente';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nome', 'email'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];



    public function createClient($request)
    {
        $client = $this->insert(['nome' => $request['nome'], 'email' => $request['email']]);
        (new ClientEndereco)->createClientAddress($client, $request);
        (new ClientTelefone)->createClientPhone($client, $request['telefone']);

        return $client;
    }

    public function updateClient($request)
    {

        $client = $this->update($request['hidden_id'],['nome' => $request['nome'], 'email' => $request['email']]);

        (new ClientEndereco)->updateClientAddress($request['hidden_id'], $request);
        (new ClientTelefone)->updateClientPhone($request['hidden_id'], $request['telefone']);

        return $client;
    }

    public function deleteClient($id)
    {
        $this->delete($id);
        (new ClientEndereco)->deleteClientAddress($id);
        (new ClientTelefone)->deleteClientePhone($id);
    }
}
