<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Shared\AuthorRelation;

/**
 * Class Category 
 * ----
 * Database models for the privacy concern and helpdesk categories. 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     App\Models
 */
class Category extends Model
{
    use AuthorRelation;

    /**
     * Mass-assign fields for the database table. 
     * 
     * @return array
     */
    protected $fillable = ['author_id', 'module', 'name', 'description'];
}
