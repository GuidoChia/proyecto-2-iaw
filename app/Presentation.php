<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $presentation_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $reactive_id
 * @property string $determination_size
 */
class Presentation extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'presentation_id';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'reactive_id', 'determination_size'];

}
