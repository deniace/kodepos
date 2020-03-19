<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    //test model
    protected $table = 'tb_test';
    protected $primaryKey = 'test_id';
    public $incrementing = true;
    public $timestamps = false;
}
