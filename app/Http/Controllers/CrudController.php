<?php


namespace App\Http\Controllers;

use App\Service\CrudService;
use Illuminate\Http\Request;

class CrudController
{

    private $service;


    public function __construct(CrudService $service)
    {
        $this->service = $service;
    }



    public function get(Request $request)
    {
        return $this->service->get($request->get('model'));
    }

    public function getByCriteria(Request $request)
    {
        return $this->service->getByCriteria($request->get('model'), $request->all());
    }

    public function create(Request $request)
    {
        return $this->service->create($request->get('model'), $request->all());
    }

    public function updateByCriteria(Request $request)
    {
        return $this->service->updateByCriteria($request->get('model'), $request->get('criteria'), $request->get('data'));
    }

    public function deleteByCriteria(Request $request) {
        return $this->service->deleteByCriteria($request->get('model'), $request->all());
    }

    public function getWithRelations(Request $request) {
        return $this->service->getWithRelations($request->get('model'), $request->get('relations'));
    }
}
