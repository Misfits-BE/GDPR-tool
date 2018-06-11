<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\AuthorRelation;
use Spatie\Sluggable\HasSlug;

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
    use AuthorRelation, HasSlug;

    /**
     * Mass-assign fields for the database table. 
     * 
     * @return array
     */
    protected $fillable = ['author_id', 'module', 'title', 'description'];
}
