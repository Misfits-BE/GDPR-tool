<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Domain
 *
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Activisme_BE
 * @package     App\Models
 */
class Domain extends Model
{
    /**
     * Mass-assign fields for the database table
     *
     * @return array
     */
    protected $fillable = ['name', 'url', 'dpo'];

    /**
     * Get all the privacy concerns for the domain\project
     * 
     * @return HasMany
     */
    public function concerns(): HasMany
    {
        return $this->hasMany(Concern::class);   
    }

    /**
     * Get the information about the platform Data Protection officer.
     *
     * @return BelongsTo
     */
    public function dpo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dpo_id');
    }
}
