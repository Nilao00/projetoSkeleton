<?php

namespace App\Services;

use App\Models\Company;
use App\Repositories\Contracts\CompanyRepository;

class CompanyService
{
    private $companyRepository;
    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }
    
    public function create(array $data): Company
    {
        return $this->companyRepository->create($data);
    }

    public function find(int $id): Company
    {
        return $this->companyRepository->find($id);
    }

    public function findById(int $id): Company
    {
        return $this->companyRepository->findById($id);
    }

    public function update(int $id, array $data): Company
    {
        return $this->companyRepository->update($id, $data);
    }

    public function delete(int $id): void
    {
        $this->companyRepository->delete($id);
    }
}