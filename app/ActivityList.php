<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class ActivityList  extends Model
{
  protected $table ="ACTIVITYLIST";
  protected $guarded = array('_token');
  const CREATED_AT = "CREATEDDATE";
  const UPDATED_AT = "LASTUPDATEDDATE";
  protected $primaryKey ="ID";

}
