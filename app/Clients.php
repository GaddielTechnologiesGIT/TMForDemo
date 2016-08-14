<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Clients  extends Model
{
  protected $table ="CLIENTS";
  protected $guarded = array('_token');
  const CREATED_AT = "CREATEDDATE";
  const UPDATED_AT = "LASTUPDATEDATE";
  protected $primaryKey ="ID";

  public function projects()
             {
                return $this->hasMany('App\Projects','CLIENTID');
            }
}
