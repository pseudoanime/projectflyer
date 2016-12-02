<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Image;

class Photo extends Model
{

  protected $file;

	protected $fillable = ['path', 'name', 'thumbnail_path'];

	protected $baseDir = "flyers\photos";

  protected static function boot()
  {
    static::creating(function ($photo)
    {
      return $photo->upload();
    });
  }

    public function flyer()
    {
    	return $this->belongsTo('App\Flyer');
    }

    public static function fromFile(UploadedFile $file)
    {
      $photo = new static;

      $photo->file = $file;

      return $photo->fill([
                'name'            => $photo->fileName(),
                'path'            => $photo->filePath(),
                'thumbnail_path'  => $photo->thumbnailPath()
        ]);
    }

    public function thumbnailPath()
    {
      return $this->baseDir . "\\tn-" . $this->fileName();
    }

    public function filePath()
    {
      return $this->baseDir . "\\" . $this->fileName();
    }

    public function fileName()
    {
      $name = sha1(time() . $this->file->getClientOriginalName());

      $extension = $this->file->getClientOriginalExtension();

      return $name . "." . $extension;
    }

   /**
    * [store description]
    * @param  UploadedFile $file [description]
    * @return [type]             [description]
    */
   public function upload()
   {
     
     $this->file->move($this->baseDir, $this->fileName());

     $this->makeThumbnail();

     return $this;

   }

   /**
    * [makeThumbnail description]
    * @return [type] [description]
    */
   protected function makeThumbnail()
   {

     Image::make($this->filePath())->fit(200)->save($this->thumbnailPath());

   }

    
}
