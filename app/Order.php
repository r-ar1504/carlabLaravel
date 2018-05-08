<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $table = 'order';
  protected $fillable = ['id', 'status', 'service_name', 'service_date', 'end_date', 'worker_id', 'user_id', 'latitude', 'longitude'];
}
