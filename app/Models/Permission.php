<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use HasFactory;
    /**
     * Get lead source all relational activity logs
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function activity(): MorphMany
    {
        return $this->morphMany(ActivityLog::class, 'loggable');
    }
}
