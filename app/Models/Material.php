<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

/**
 * @package App\Models
 *
 * @property string title
 * @property string path
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Material extends Model
{
    use HasFactory;
}
