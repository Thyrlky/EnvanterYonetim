<?php

namespace App\Models\CommonItem;
use Illuminate\Database\Eloquent\Model;

class CommonItemOwner extends Model
{
    protected $table="common_item_owner";
    public $timestamps = false;
    public function getInfo(){
        return $this->hasOne('App\Models\CommonItem\CommonItem','id','common_item_id');
    }
}
