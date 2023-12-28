<?php

namespace App\Helpers;

trait ValidationClient
{
    public function validateCreateCostumer(): bool
    {
        return $this->validate([
            'nome'     => 'required|min_length[3]',
            'email'    => 'required|valid_email',
            'telefone' => 'required|numeric',
            'endereco' => 'required|numeric|min_length[8]',
        ]);
    }

    public function validateUpdateCostumer(): bool
    {
        return $this->validate([
            'nome'     => 'min_length[3]',
            'email'    => 'valid_email',
            'telefone' => 'numeric',
            'endereco' => 'numeric|min_length[8]',
        ]);
    }
}
