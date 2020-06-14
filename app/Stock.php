<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property int $amount
 * @property string $expiration
 * @property integer $presentation_id
 */
class Stock extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'amount', 'expiration', 'reactive_id'];

    /**
     * Get the reactive from the presentation.
     */
    public function reactive()
    {
        return $this->belongsTo('App\Reactive');
    }

}
