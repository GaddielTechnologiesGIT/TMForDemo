<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Activists  extends Model
{
  protected $table ="ACTIVISTS";
  protected $guarded = array('_token');
  const CREATED_AT = "CREATEDDATE";
  const UPDATED_AT = "LASTUPDATEDATE";
  protected $primaryKey ="ID";


}
