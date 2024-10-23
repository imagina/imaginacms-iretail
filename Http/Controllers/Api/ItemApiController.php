<?php

namespace Modules\Iretail\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Iretail\Entities\Item;
use Modules\Iretail\Repositories\ItemRepository;

class ItemApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(Item $model, ItemRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
}
