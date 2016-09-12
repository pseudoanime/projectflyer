<?php

namespace App;

use App\Photo;
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

    /**
     * getPriceAttribute 
     * @param  [type] $price [description]
     * @return [type]        [description]
     */
    public function getPriceAttribute($price)
    {
    	return "$" . number_format($price);
    }

    /**
     * scopeLocatedAt 
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function scopeLocatedAt($query, $zip, $street)
    {
    	$street = str_replace("-", " ", $street);

    	return static::where('postcode', $zip)->where('street', $street)->first();
    }

    public function addPhoto(Photo $photo)
    {
    	$this->photos()->save($photo);
    }
}
