<?php

namespace Modules\Iretail\Entities;

use Modules\Core\Icrud\Entities\CrudStaticModel;

class Type extends CrudStaticModel
{
  const ENTRY = 1;

  const OUTPUT = 2;


  public function __construct()
  {
    $this->records = [
      self::ENTRY => [
        'id' => self::ENTRY,
        'title' => trans('iretail::common.type.entry'),
        "color" => 'green',
        "icon" => 'fa-solid fa-arrow-up'
      ],
      self::OUTPUT => [
        'id' => self::OUTPUT,
        'title' => trans('iretail::common.type.output'),
        "color" => 'red',
        "icon" => 'fa-solid fa-arrow-down'
      ]
    ];
  }

}
