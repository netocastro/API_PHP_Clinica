<?php

namespace Source\Models;

use Stonks\DataLayer\DataLayer;

class Pacientes extends DataLayer
{
      public function __construct()
      {
            parent::__construct('pacientes', ['nome', 'cpf'], 'id', true);
      }
}
