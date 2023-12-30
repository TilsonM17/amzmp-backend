<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientEndereco extends Model
{
    protected $table            = 'cliente_endereco';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['cliente_id', 'cep', 'logradour', 'complemento', 'bairro', 'localidade', 'ibge'];

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

    public function createClientAddress($clienteId, $address)
    {
        $addressInfo = json_decode($address['endereco_info'][0], true);

        return $this->insert([
            'cliente_id' => $clienteId,
            'cep' => $address['endereco'],
            'logradouro' => $addressInfo['logradouro'],
            'complemento' => $addressInfo['complemento'],
            'bairro' => $addressInfo['bairro'],
            'localidade' => $addressInfo['localidade'],
            'ibge' => $addressInfo['ibge']
        ]);
    }

    public function updateClientAddress($clienteId, $address)
    {
        $addressInfo = json_decode($address['endereco_info'][0], true);

        return $this->update($clienteId, [
            'cep' => $address['endereco'],
            'logradouro' => $addressInfo['logradouro'] ?? '',
            'complemento' => $addressInfo['complemento'] ?? '',
            'bairro' => $addressInfo['bairro'] ?? '',
            'localidade' => $addressInfo['localidade'] ?? '',
            'ibge' => $addressInfo['ibge'] ?? ''
        ]);
    }

    public function deleteClientAddress($id)
    {
        $this->where('cliente_id', $id)->delete();
    }
}
