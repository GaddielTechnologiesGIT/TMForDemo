<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Projects  extends Model
{
  protected $table ="PROJECTS";
  protected $guarded = array('_token');
  const CREATED_AT = "CREATEDDATE";
  const UPDATED_AT = "LASTUPDATEDATE";
  protected $primaryKey ="ID";

  public function clients(){
        return $this->belongsTo('App\Clients');
     }

     public function categories()
                {
                   return $this->hasMany('App\ProjectActivity','PROJECTID');
               }
}
