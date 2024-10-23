<?php

namespace Modules\Iretail\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;

class Item extends CrudModel
{
  use Translatable;

  protected $table = 'iretail__items';
  public $transformer = 'Modules\Iretail\Transformers\ItemTransformer';
  public $repository = 'Modules\Iretail\Repositories\ItemRepository';
  public $requestValidation = [
    'create' => 'Modules\Iretail\Http\Requests\CreateItemRequest',
    'update' => 'Modules\Iretail\Http\Requests\UpdateItemRequest',
  ];
  //Instance external/internal events to dispatch with extraData
  public $dispatchesEventsWithBindings = [
    //eg. ['path' => 'path/module/event', 'extraData' => [/*...optional*/]]
    'created' => [],
    'creating' => [],
    'updated' => [],
    'updating' => [],
    'deleting' => [],
    'deleted' => []
  ];
  public $translatedAttributes = ['title'];
  protected $fillable = [
    'purchase_price',
    'sale_price',
    'quantity',
    'status',
    'options'
  ];
  protected $casts = [
    'options' => 'array'
  ];
}
