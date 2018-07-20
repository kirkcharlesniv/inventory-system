<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string id_num
 */
class Employee extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
