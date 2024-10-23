<?php

namespace Modules\Iretail\Repositories\Cache;

use Modules\Iretail\Repositories\TransactionRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheTransactionDecorator extends BaseCacheCrudDecorator implements TransactionRepository
{
  public function __construct(TransactionRepository $transaction)
  {
    parent::__construct();
    $this->entityName = 'iretail.transactions';
    $this->tags = ['iretail.items'];
    $this->repository = $transaction;
  }
}
