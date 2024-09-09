<?php

namespace App\Repositories;

use App\Models\Adress;
use App\Repositories\Contracts\AdressRepository;

class AdressRepositories implements AdressRepository
{
    private $adress;
    public function __construct(Adress $adress)
    {
        $this->adress = $adress;
    }
    
    public function create(array $data): Adress
    {
        return $this->adress->create($data);
    }

    public function find(int $id): Adress
    {
        return $this->adress->find($id);
    }

    public function findById(int $id): Adress
    {
        return $this->adress->findOrFail($id);
    }

    public function update(int $id, array $data): Adress
    {
        return $this->adress->findOrFail($id)->update($data);
    }

    public function delete(int $id): void
    {
        $this->adress->destroy($id);
    }
}