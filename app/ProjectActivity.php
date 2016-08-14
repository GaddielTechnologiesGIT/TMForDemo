<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class ProjectActivity  extends Model
{
  protected $table ="PROJECT_ACTIVITY";
  protected $guarded = array('_token');
  const CREATED_AT = "CREATEDDATE";
  const UPDATED_AT = "LASTUPDATEDATE";
  protected $primaryKey ="ID";
  public function getactivists(){
        return $this->belongsTo('App\Activists');
     }

}
