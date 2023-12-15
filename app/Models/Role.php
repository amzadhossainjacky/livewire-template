<?php

namespace App\Models;


use Carbon\Carbon;
use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Role model class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

class Role extends SpatieRole
{
    use HasFactory;

    protected $fillable = ['name', 'guard_name', 'route_segment', 'is_active'];

    /**
     * Interact with name
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function name(): Attribute
    {
        return new Attribute(
            set: fn ($value) => str_replace(' ', '_', strtoupper($value)),
            get: fn ($value) => _str_conversion($value, 'ucwords', true, false, false)
        );
    }

    /**
     * Interact with route_segment
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function routeSegment(): Attribute
    {
        return new Attribute(
            set: fn ($value) => _str_conversion($value, 'strtolower', false, false, true),
            get: fn ($value) => _sub_string($value, -1, false, false)
        );
    }

    /**
     * Interact with created_at
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function createdAt(): Attribute
    {
        return new Attribute(
            get: fn ($value) => _date_format($value, 'd M, Y')
        );
    }

    /**
     * Interact with updated_at
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function updatedAt(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value)->diffForHumans()
        );
    }


    /**
     * Interact with updated_at
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'model_has_roles', 'role_id', 'model_id');
    }

    /**
     * Get user's all relational activity logs
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function activity(): MorphMany
    {
        return $this->morphMany(ActivityLog::class, 'loggable');
    }

    public function role_permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions', 'role_id', 'permission_id');
        // return $this->belongsToMany(Permission::class, 'role_has_permissions', 'permission_id', 'role_id');
    }
}
