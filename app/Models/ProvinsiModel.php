<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProvinsiModel extends Model
{
    //tabel kodepos_db2
    protected $table = 'db_province_data'; // nama tabel di database
    protected $primaryKey = 'province_code'; // nama primary key di database
    public $incrementing = false; // primary key jika auto increment set true
    // protected $keyType = 'string';// type data untuk primary key
    public $timestamps = false; // jika ada column created_at and updated_at di tabel maka set true 
}
