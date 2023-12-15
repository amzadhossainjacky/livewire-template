<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * User model class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'code',
        'mobile',
        'is_active',
        'gender',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['first_role', 'route_segment'];


    /**
     * Interact with user mobile
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function mobile(): Attribute
    {
        return new Attribute(
            set: function ($value) {
                return (strlen($value) == 13) ? $value : _get_mobile_number_13($value);
            },
        );
    }

    /**
     * Interact with user first_role
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function firstRole(): Attribute
    {
        return new Attribute(
            get: function () {
                return $this->getRoleNames()->first() ? _sub_string($this->getRoleNames()->first(), -1) : __('undefined ');
            },
        );
    }

    /**
     * Interact with user name
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function name(): Attribute
    {
        return new Attribute(
            get: function ($value) {
                return ucwords($value);
            },
        );
    }


    /**
     * Interact with user first_role
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function routeSegment(): Attribute
    {
        return new Attribute(
            get: function () {
                return $this->getRoleNames()->count() ? $this->roles()->get()->pluck('route_segment')->toArray()[0] : 'admin';
            },
        );
    }

    /**
     * Get user's all relational activity logs
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function activity(): MorphMany
    {
        return $this->morphMany(ActivityLog::class, 'loggable');
    }

    /**
     * search method to search by model attributes
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function search($search): Builder
    {
        $terms = "%{$search}%";
        return empty($search)
            ? static::query()
            : static::query()
            ->orWhere('id', 'like', $terms)
            ->orWhere('name', 'like', $terms)
            ->orWhere('email', 'like', $terms)
            ->orWhere('is_active', 'like', $terms)
            ->orWhere('mobile', 'like', $terms)
            ->orWhere('created_at', 'like', $terms)
            ->orWhere('updated_at', 'like', $terms);
    }

    // /**
    //  * Get roles of user
    //  * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
    //  */
    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class, 'user_id', 'id');
    // }
}
