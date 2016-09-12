<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Photo extends Model
{

	protected $fillable = ['path'];

	protected $baseDir = "\\flyers\photos\\";

    public function flyer()
    {
    	return $this->belongsTo('App\Flyer');
    }

    public static function fromForm(UploadedFile $file)
    {

    	$photo = new static;
    	
    	$fileName = time() . str_replace(" ", "-",$file->getClientOriginalName());

       	$file->move('flyers\photos', $fileName);

       	$photo->path = $photo->baseDir . $fileName;

       	return $photo;

   }

    
}
