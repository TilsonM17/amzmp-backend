<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientTelefone extends Model
{
    protected $table            = 'cliente_telefone';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['cliente_id', 'telefone'];

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


    public function createClientPhone($clienteId, $phone)
    {
        return $this->insert(['cliente_id' => $clienteId, 'telefone' => $phone]);
    }

    public function updateClientPhone($clienteId, $phone)
    {
        return $this->update($clienteId, ['telefone' => $phone]);
    }

    public function deleteClientePhone($id)
    {
        $this->where('cliente_id', $id)->delete();
    }
}
