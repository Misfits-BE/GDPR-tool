<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

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
     * Query scope for all the open concerns.
     *
     * @param  mixed $query The eloquent builder instance.
     * @return Builder
     */
    public function scopeOpenConcerns($query): Builder
    {
        return $query->where('is_open', true);
    }

    /**
     * Query scope for all the closed concerns.
     *
     * @param  mixed $query The eloquent builder instance
     * @return Builder
     */
    public function scopeClosedConcerns($query): Builder
    {
        return $query->where('is_open', false);
    }
}
