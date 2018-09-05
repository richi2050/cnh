<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionPro extends Model
{
    protected $connection = 'mysql';
    protected $table = 'chkph_options';
    protected $primaryKey = 'option_id';
    protected $fillable = [
        'option_id',
        'option_name',
        'option_value',
        'autoload'];
    public $timestamps = false; 
}
