<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Flyer;
use App\Photo;
use App\Http\Requests;
use App\Http\Requests\FlyerRequest;
use App\Http\Utilities\Country;
use Log;

class FlyersController extends Controller
{
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

    	Flyer::create($request->all());

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

    public function addPhoto($postcode, $street, Request $request)
    {

        $this->validate($request, [
            'photo' =>  'required|mimes:jpg,png,bmp,jpeg'
        ]);

       $file =$request->file('photo');

       $photo = Photo::fromForm($file);
       
       $flyer = Flyer::locatedAt($postcode, $street)->addPhoto($photo);

       // $flyer->addPhoto();

       // $flyer->photos()->create(['path' => "\\flyers\photos\\$fileName"]);
   }
}
