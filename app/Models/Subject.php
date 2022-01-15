<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string title
 * @property integer user_id
 */
class Subject extends Model
{
    use HasFactory;
    public $timestamps = false;
}
