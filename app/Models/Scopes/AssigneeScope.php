<?php 

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

/**
 * Trait AssigneeScope 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     App\Models\Scopes
 */
trait AssigneeScope 
{
    /**
     * Query scope for all the open tickets that are assigned to the authenticated user. 
     * 
     * @return Builder
     */
    public function scopeAssigned($query): Builder 
    {
        return $query->open()->where('assignee_id', auth()->user()->id);
    }
}