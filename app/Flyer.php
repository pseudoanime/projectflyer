<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{

	protected $fillable = ['street', 'postcode', 'city', 'country', 'state', 'description', 'price'];

	/**
	 * photos
	 * @access public
	 *
	 * A flyer is composed of Many photos
	 * 
	 * @return Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function photos()
    {
    	return $this->hasMany('App\Photo');
    }
}
