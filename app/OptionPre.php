<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionPre extends Model
{
    protected $connection = 'mysql_2';
    protected $table = 'chkph_options';
    protected $primaryKey = 'option_id';
    public $timestamps = false; 
    protected $fillable = [
        'option_id',
        'option_name',
        'option_value',
        'autoload'];
}
