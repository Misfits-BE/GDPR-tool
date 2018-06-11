<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\{AuthorRelation, AssigneeRelation};
use App\Models\Scopes\AssigneeScope;

/**
 * Class Concern
 * ----
 * Database models for all the privacy concerns.
 *
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Activisme_BE
 * @package     App\Models
 */
class Concern extends Model
{
    use AuthorRelation, AssigneeRelation, AssigneeScope; 

    /**
     * Mass-assign fields for the database table. 
     * 
     * @return array
     */
    protected $fillable = ['author_id', 'domain_id', 'is_open', 'title', 'concern'];

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

    /**
     * Query scope for all the created concerns. (authenticated user)
     * 
     * @return Builder
     */
    public function scopeOwnConcerns($query): Builder
    {
        return $query->open()->where('author_id', auth()->user()->id);
    }
}
