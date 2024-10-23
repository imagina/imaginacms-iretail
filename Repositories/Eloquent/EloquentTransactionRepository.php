<?php

namespace Modules\Iretail\Repositories\Eloquent;

use Modules\Iretail\Repositories\TransactionRepository;
use Modules\Core\Icrud\Repositories\Eloquent\EloquentCrudRepository;
use Modules\Iretail\Entities\Type;

class EloquentTransactionRepository extends EloquentCrudRepository implements TransactionRepository
{
  /**
   * Filter names to replace
   * @var array
   */
  protected $replaceFilters = [];

  /**
   * Relation names to replace
   * @var array
   */
  protected $replaceSyncModelRelations = [];

  /**
   * Attribute to define default relations
   * all apply to index and show
   * index apply in the getItemsBy
   * show apply in the getItem
   * @var array
   */
  protected $with = [/*all => [] ,index => [],show => []*/];

  /**
   * Filter query
   *
   * @param $query
   * @param $filter
   * @param $params
   * @return mixed
   */
  public function filterQuery($query, $filter, $params)
  {

    /**
     * Note: Add filter name to replaceFilters attribute before replace it
     *
     * Example filter Query
     * if (isset($filter->status)) $query->where('status', $filter->status);
     *
     */

    //Response
    return $query;
  }

  /**
   * Method to sync Model Relations
   *
   * @param $model ,$data
   * @return $model
   */
  public function syncModelRelations($model, $data)
  {
    //Get model relations data from attribute of model
    $modelRelationsData = ($model->modelRelations ?? []);

    /**
     * Note: Add relation name to replaceSyncModelRelations attribute before replace it
     *
     * Example to sync relations
     * if (array_key_exists(<relationName>, $data)){
     *    $model->setRelation(<relationName>, $model-><relationName>()->sync($data[<relationName>]));
     * }
     *
     */

    //Response
    return $model;
  }

  //Before create
  public function beforeCreate(&$data)
  {
    //Get the transaction item
    $itemRepository = app('Modules\Iretail\Repositories\ItemRepository');
    $item = $itemRepository->getItem($data['item_id']);
    //set the price of the transaction
    $data['price'] =($data['type_id'] == Type::ENTRY) ?
        $item->purchase_price : $item->sale_price;
    //set the total of the transaction
    $data['total'] = $data['quantity'] * ($data['type_id'] == Type::ENTRY ?
        $item->purchase_price : $item->sale_price);
    //Update the item quantity
    if ($data['type_id'] == Type::ENTRY) $item->increment('quantity', $data['quantity']);
    else $item->decrement('quantity', $data['quantity']);
  }
}
