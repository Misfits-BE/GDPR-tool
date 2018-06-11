<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Concern
 * ----
 * Database models for all the privacy concerns.
 *
 * @todo Build up the migration file.
 *
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Activisme_BE
 * @package     App\Models
 */
class Concern extends Model
{
    /**
     * Mass-assign fields for the database table. 
     * 
     * @return array
     */
    protected $fillable = ['author_id', 'plaform_id', 'is_open', 'title', 'content'];

    /**
     * Get the information from the assigned user through the relation.
     * @return BelongsTo
     */
    public function assignedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }

    /**
     * Query scope for all the open concerns.
     *
     * @param  mixed $query The eloquent builder instance.
     * @return Builder
     */
    public function scopeOpen($query): Builder
    {
        return $query->where('is_open', true);
    }

    /**
     * Query scope for all the closed concerns.
     *
     * @param  mixed $query The eloquent builder instance
     * @return Builder
     */
    public function scopeClosed($query): Builder
    {
        return $query->where('is_open', false);
    }
}
