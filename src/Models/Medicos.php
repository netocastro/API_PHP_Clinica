<?php

namespace Source\Models;

use Stonks\DataLayer\DataLayer;

class Medicos extends DataLayer
{
      public function __construct()
      {
            parent::__construct('medicos', ['nome', 'cpf'], 'id', true);
      }
}
