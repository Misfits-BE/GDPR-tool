<?php 

namespace App\Models\Relations;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\User;
 
/**
 * Trait AssigneeRelation
 * ---- 
 * The database relation for the person that is assigned to a concern/ticket.
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     App\Models\Shared
 */
trait AssigneeRelation
{
    /**
     * The database relation for the assigned user data. 
     * 
     * @todo Implement wiothDefault for the name in the later staduim.
     * 
     * @return BelongsTo
     */
    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}