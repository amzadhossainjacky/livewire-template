<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Setting model class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'value'];
}
