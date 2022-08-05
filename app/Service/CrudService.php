<?php

namespace App\Service;


use Carbon\Carbon;

class CrudService
{
    public function get($model)
    {
        return $model::all();
    }

    public function getBySingleCriteria($model, $parameterName, $parameterValue)
    {
        return $model::where($parameterName, '=', $parameterValue)->get();
    }

    public function getWithRelation($model, $relationName)
    {
        return $model::with($relationName)->get();
    }

    public function create($model, $data)
    {
        foreach ($data as $key=>$element) {
            if(str_contains($key, 'date')) {

                $data[$key] = Carbon::parse($element);
            }
        }

        return $model::create($data);
    }

    private function formCriteria($data)
    {
        $criteria = [];
        foreach ($data as $key => $value) {
            $currentValue = str_contains($key, 'id') ? intval($value) : $value;
            array_push($criteria, [$key, '=', $currentValue]);
        }

        return $criteria;
    }

    public function getByCriteria($model, $data)
    {
        unset($data['model']);
        return $this->getBuilderByCriteria($model, $data)->get();
    }

    private function getBuilderByCriteria($model, $data) {

        return $model::where($this->formCriteria($data));
    }

    public function deleteByCriteria($model, $data)
    {
        unset($data['model']);
        return $this->getBuilderByCriteria($model, $data)->delete();
    }

    public function updateByCriteria($model, $criteria, $data)
    {

        unset($data['model']);
        $instances = $this->getByCriteria($model, $criteria);
        foreach ($instances as $instance) {
            $instance->fill($data);
            $instance->save();
        }
        return $instances;
    }
}
