<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class KeyValues  extends Model
{
  protected $table ="KEYVALUES";
  protected $guarded = array('_token');
  const CREATED_AT = "CREATEDDATE";
  const UPDATED_AT = "LASTUPDATEDDATE";
  protected $primaryKey ="ID";


}
