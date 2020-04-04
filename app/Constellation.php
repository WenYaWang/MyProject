<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constellation extends Model
{
    protected $table = 'constellations';
    protected $fillable = ['datadate', 'name', 'overall_score', 'overall_desc', '', 'love_desc', 'cause_desc', 'forune_desc'];
    public $timestamps = false;
}
