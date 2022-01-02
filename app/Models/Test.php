<?php

namespace App\Models;

/**
 * App\Models
 * @property int group_id
 * @property string title
 * @property string questions in json format
 */
class Test extends Model
{
    protected $table = 'tests';

    public function group(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
