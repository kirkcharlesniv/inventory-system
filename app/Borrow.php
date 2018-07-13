<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $table = 'borrow_records';
    protected $primaryKey = 'borrow_id';
}
