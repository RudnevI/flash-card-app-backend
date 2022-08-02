<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractModel extends Model {

    protected array $textFields;

    protected array $numericFields;

    protected array $foreignKeys;

    public function getTextFields() {
        return $this->textFields;
    }

    public function getNumericFields() {
        return $this->numericFields;
    }

    public function getForeignKeys()
    {
      return $this->foreignKeys;
    }

}
