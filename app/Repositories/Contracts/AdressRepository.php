<?php

namespace App\Repositories\Contracts;

use App\Models\Adress;

interface AdressRepository
{
    public function create(array $data): Adress;

    public function find(int $id): Adress;

    public function findById(int $id): Adress;

    public function update(int $id, array $data): Adress;

    public function delete(int $id): void;
}