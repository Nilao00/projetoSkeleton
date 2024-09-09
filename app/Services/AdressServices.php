<?php

namespace App\Services;

use App\Models\Adress;
use App\Repositories\AdressRepositories;

class AdressServices
{
    private $adressRepository;
    public function __construct(AdressRepositories $adressRepository)
    {
        $this->adressRepository = $adressRepository;
    }
    
    public function create(array $data): Adress
    {
        return $this->adressRepository->create($data);
    }

    public function find(int $id): Adress
    {
        return $this->adressRepository->find($id);
    }

    public function findById(int $id): Adress
    {
        return $this->adressRepository->findById($id);
    }

    public function update(int $id, array $data): Adress
    {
        return $this->adressRepository->update($id, $data);
    }

    public function delete(int $id): void
    {
        $this->adressRepository->delete($id);
    }
}