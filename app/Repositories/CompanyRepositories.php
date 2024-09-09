<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\Contracts\CompanyRepository;

class CompanyRepositories implements CompanyRepository
{
    private $company;
    public function __construct(Company $company)
    {
        $this->company = $company;
    }
    
    public function create(array $data): Company
    {
        return $this->company->create($data);
    }

    public function find(int $id): Company
    {
        return $this->company->find($id);
    }

    public function findById(int $id): Company
    {
        return $this->company->findOrFail($id);
    }

    public function update(int $id, array $data): Company
    {
        return $this->company->findOrFail($id)->update($data);
    }

    public function delete(int $id): void
    {
        $this->company->destroy($id);
    }
}