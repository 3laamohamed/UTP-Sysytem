<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesGroup extends Model
{
    use HasFactory;
    protected $table ='services_groups';
    protected $guarded = [];
    public function Services(){
      return $this->hasMany('App\Models\Services','group_id','id');
    }
}
