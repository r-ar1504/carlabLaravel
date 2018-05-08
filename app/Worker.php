<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
  protected $table = 'worker';
  protected $fillable = ['name', 'last_name', 'email', 'role', 'phone', 'status', 'created_at', 'updated_at'];
}
