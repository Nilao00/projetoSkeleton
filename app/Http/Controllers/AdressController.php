<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdressRequest;
use App\Services\AdressServices;

class AdressController extends Controller
{
    private $adressService;
    public function __construct(AdressServices $adressService)
    {
        $this->adressService = $adressService;
    }
     
    public function create(AdressRequest $request)
    {
        return $this->adressService->create($request->validated());
    }
  
    public function find(int $id)
    {
        return $this->adressService->find($id);
    }

    public function findById(int $id)
    {
        return $this->adressService->findById($id);
    }

    public function update(AdressRequest $request, int $id)
    {
        return $this->adressService->update($id, $request->validate());
    }

    public function delete(int $id)
    {
        $this->adressService->delete($id);
    }
 
}
