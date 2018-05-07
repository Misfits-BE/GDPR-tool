<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Domain
 *
 * @author
 * @copyright
 * @package     App\Models
 */
class Domain extends Model
{
    /**
     * Mass-assign fields for the database table
     *
     * @return array
     */
    protected $fillable = [];

    /**
     * Get all the privacy concerns for the domain\project
     * 
     * @return HasMany
     */
    public function concerns()
    {
        return $this->hasMany(Concern::class);   
    }
}
