<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Shared\AuthorRelation;

/**
 * Class Support 
 * ---- 
 * The database model for all the support tickets in the application 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     App\Models
 */
class Support extends Model
{
    use AuthorRelation;

    /**
     * Mass-assign fields for the database table. 
     * 
     * @return array
     */
    protected $fillable = [];
}
