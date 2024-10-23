<?php

namespace Modules\Iretail\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Iretail\Entities\Transaction;
use Modules\Iretail\Repositories\TransactionRepository;

class TransactionApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(Transaction $model, TransactionRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
}
