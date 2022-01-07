<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

/**
 * @package App\Models
 *
 * @property string title
 * @property string path
 * @property integer subject_id
 */
class Material extends Model
{
    use HasFactory;

    public function subjects(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Subject::class)->using(MaterialSubject::class);
    }
}
