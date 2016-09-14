<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Image;

class Photo extends Model
{

	protected $fillable = ['path', 'name', 'thumbnail_path'];

	protected $baseDir = "flyers\photos";

    public function flyer()
    {
    	return $this->belongsTo('App\Flyer');
    }

    public static function named($name)
    {

      return (new static)->saveAs($name);
    	
    }

   protected function saveAs($name)
   {

      $this->name = sprintf("%s-%s", time(), str_replace(" ", "-", $name));

      $this->path = sprintf("%s\%s", $this->baseDir, $this->name);

      $this->thumbnail_path = sprintf("%s\\tn-%s", $this->baseDir, $this->name);

      return $this;
   }

   /**
    * [store description]
    * @param  UploadedFile $file [description]
    * @return [type]             [description]
    */
   public function move(UploadedFile $file)
   {
     
     $file->move($this->baseDir, $this->name);

     $this->makeThumbnail();

     return $this;

   }

   /**
    * [makeThumbnail description]
    * @return [type] [description]
    */
   protected function makeThumbnail()
   {

     Image::make($this->path)->fit(200)->save($this->thumbnail_path);

   }

    
}
