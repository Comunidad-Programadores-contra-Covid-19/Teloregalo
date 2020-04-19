<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;

class OfferController extends Controller
{
    // function _construct() doesn't allow users see offers until login 
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commerceEmail = auth()->user()->email;
        $offers = Offer::where('id_commerce', $commerceEmail)->paginate(4);
        return view('offers.list',compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        To do validations
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required'
        ]);*/

        $offer = new Offer();
        $offer->name_offer = $request->name_offer;
        $offer->description_offer = $request->description_offer;
        $offer->cost = $request->cost;
        $offer->amount = $request->amount;
        $offer->is_enabled= $request->is_enabled;
        
        $offer->id_commerce = auth()->user()->email;
        $offer->save();

        return redirect('/offers')->with('success', 'Oferta creada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = Offer::find($id);
        return view('offers.edit', compact('offer'));
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
        $offer = Offer::find($id);
        $offer->name_offer =  $request->get('name_offer');
        $offer->description_offer = $request->get('description_offer');
        $offer->cost = $request->get('cost');
        $offer->amount = $request->get('amount');
        $offer->is_enabled = $request->get('is_enabled');
        $offer->save();

        //To stay in /edit when updated
        //return back()->with('message','Oferta editada.');
        return redirect('/offers')->with('success', 'Oferta actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = Offer::find($id);
        $offer->delete();

        return redirect('/offers')->with('success', 'Oferta eliminada.');
    }
}
