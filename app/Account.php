<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'tbl_accounts';
    
    protected $guarded = [];
}