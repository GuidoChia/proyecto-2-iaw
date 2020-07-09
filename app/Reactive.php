<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
/**
 * @property integer $reactive_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $name
 * @property string $description
 * @property string $barcode
 */
class Reactive extends Model {
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'name', 'description', 'barcode'];

    /**
     * Get the stocks for the reactive.
     */
    public function stocks() {
        return $this->hasMany('App\\Stock');
    }

    public function scopeLike($query, $field, $value) {
        return $query->where($field, 'LIKE', "%$value%");
    }

    public function getAmount($date, $type){
        return $this->stocks()
            ->where('expiration', '=', $date)
            ->where('type', '=', $type)
            ->get()
            ->count();
    }

}
