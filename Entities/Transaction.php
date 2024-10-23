<?php

namespace Modules\Iretail\Entities;

use Modules\Core\Icrud\Entities\CrudModel;
use Modules\Iwallet\Traits\isTransactionable;

class Transaction extends CrudModel
{
  use isTransactionable;

  protected $table = 'iretail__transactions';
  public $transformer = 'Modules\Iretail\Transformers\TransactionTransformer';
  public $repository = 'Modules\Iretail\Repositories\TransactionRepository';
  public $requestValidation = [
    'create' => 'Modules\Iretail\Http\Requests\CreateTransactionRequest',
    'update' => 'Modules\Iretail\Http\Requests\UpdateTransactionRequest',
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
  protected $fillable = [
    'quantity',
    'type_id',
    'item_id',
    'price',
    'total',
    'comment'
  ];

  public function item()
  {
    return $this->belongsTo(Item::class);
  }

  public function getTypeAttribute()
  {
    $typeClass = new Type();
    return $typeClass->show($this->type_id);
  }

  public function getTransactionData()
  {
    return [[
      "amount" => $this->total,
      "pocketType" => $this->type_id == Type::ENTRY ? 'from' : 'to',
      "comment" => "Retail::{$this->id} / {$this->type['title']} / {$this->quantity} {$this->item->title}"
    ]];
  }
}
