<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capture extends Model
{
    protected $fillable = [
        'device_id', 'cid', 'pbdata', 'cbdata'
    ];


    public function getPbdataAttribute($data)
    {
        return json_encode($data);
    }
//
    public function setPbataAttribute($data)
    {
        $this->attributes['pbdata'] = base64_decode($data);
    }
}


