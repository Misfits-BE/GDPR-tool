<?php 

namespace App\Models\Relations;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\User;
 
/**
 * Trait AuthorRelation 
 * ---- 
 * The database author relation that we share accross multiple database models. 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     App\Models\Shared
 */
trait AuthorRelation 
{
    /**
     * The DB relation that we use to get the information about the author profile.
     * 
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id')->withDefault([
            'name' => 'Onbekende of verwijderde gebruiker.'
        ]);
    }
}