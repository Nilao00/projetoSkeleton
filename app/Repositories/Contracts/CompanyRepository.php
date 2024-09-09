<?php

namespace App\Repositories\Contracts;

use App\Models\Company;

interface CompanyRepository
{
    public function create(array $data): Company;

    public function find(int $id): Company;

    public function findById(int $id): Company;

    public function update(int $id, array $data): Company;

    public function delete(int $id): void;
}