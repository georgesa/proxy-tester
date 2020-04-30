<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lookup extends Model
{
    protected $fillable = [
        'url',
        'proxy_ip',
        'proxy_port',
        'response_code',
        'response_time',
    ];
}
