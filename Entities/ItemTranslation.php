<?php

namespace Modules\Iretail\Entities;

use Illuminate\Database\Eloquent\Model;

class ItemTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title'];
    protected $table = 'iretail__item_translations';
}
