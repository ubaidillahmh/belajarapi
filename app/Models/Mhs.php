<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mhs extends Model
{
    protected $table = 'mhs';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $keyType = 'string';
    protected $fillable = [
    					'nim',
    					'nama',
    					'angkatan'
    				];
}
