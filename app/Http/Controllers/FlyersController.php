<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Alert;
use App\Events\PhotoHasBeenAdded;
use App\Flyer;
use App\Photo;
use App\Http\Requests;
use App\Http\Requests\addPhotoRequest;
use App\Http\Requests\FlyerRequest;
use App\Http\Utilities\Country;
use Log;

class FlyersController extends Controller
{
    /**
     * constructor makes sure the user is authenticated to acess
     */
    public function __construct()
    {
       $this->middleware('auth', ["except" => ["show"]]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	
    	return view('flyers.create');
    	
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\FlyerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlyerRequest $request)
    {
        Log::debug(__METHOD__ . " : bof");

        $data = $request->all();

        $data["user_id"] = auth()->user()->id;

    	$flyer = Flyer::create($data);

        // $flyer->user_id = auth()->user()->id;

        // $flyer->save();

        Alert::success('Success!', 'Your Flyer has been created');

    	return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($zip, $street)
    {
        Log::debug(__METHOD__ . " : bof");

        $flyer = Flyer::locatedAt($zip,$street);

        return view('flyers.show', compact('flyer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addPhoto($postcode, $street, addPhotoRequest $request)
    {

        $photo = Photo::fromFile($request->file('photo'));
       
        $flyer = Flyer::locatedAt($postcode, $street)->addPhoto($photo);

       // event(new PhotoHasBeenAdded);
   }

   public function makePhoto(UploadedFile $file)
   {
       return Photo::named($file->getClientOriginalName())->move($file);
   }
}
