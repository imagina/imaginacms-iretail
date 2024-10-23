<?php

namespace Modules\Iretail\Repositories\Cache;

use Modules\Iretail\Repositories\ItemRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheItemDecorator extends BaseCacheCrudDecorator implements ItemRepository
{
    public function __construct(ItemRepository $item)
    {
        parent::__construct();
        $this->entityName = 'iretail.items';
        $this->repository = $item;
    }
}
