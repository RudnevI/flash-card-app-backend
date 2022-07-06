<?php

namespace App\Service;


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
        return $model::create($data);
    }

    private function formCriteria($data)
    {
        $criteria = [];
        foreach ($data as $key => $value) {
            array_push($criteria, [$key, '=', $value]);
        }
        return $criteria;
    }

    public function getByCriteria($model, $data)
    {
        unset($data['model']);
        return $model::where($this->formCriteria($data))->get();
    }

    public function deleteByCriteria($model, $data)
    {
        unset($data['model']);
        $this->getByCriteria($model, $data)->delete();
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
