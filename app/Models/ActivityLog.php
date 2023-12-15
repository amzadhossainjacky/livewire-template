<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivityLog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'event',
        'subject',
        'model',
        'description',
        'properties',
        'is_read',
        'loggable_type',
        'loggable_id',
    ];


    /**
     * Get the relational user model
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
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
     * Get the relational loggable type parent model
     * @return MorphTo
     */
    public function loggable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get activity's all relational
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function notify(): MorphMany
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }


    /**
     * Get activity's all relational
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function do_notify(): MorphMany
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }
}
