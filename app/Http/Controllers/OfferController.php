<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
use Auth;
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
        $commerceEmail = auth()->user()->id;
        $offers = Offer::where('store_id', $commerceEmail)->get();
        return view('offers.list', compact('offers'));
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
        $offer->amount = 0;
        $offer->total_amount=0;
        if ($request->has('imageOffer')) {
            $offer->image_offer = $request->file('imageOffer')->store('public');
        }
        $offer->store_id = Auth::user()->store->id;
        $offer->save();
 
        return back()->with('success', 'Oferta creada '. $request->name_offer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = Offer::find($id);
        return view('offers.buy_product', ['offer' => $offer]);
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

        return redirect('stores/misProductos')->with('success', 'Oferta eliminada.');
    }
    public function offerImageUpdate($id){
        
       

        if ($request->has('imageOffer')) {
            $offerImageUpdate = Store::findOrFail($id);
            $offerImageUpdate->image_offer = $request->file('imageOffer')->store('public');
            $offerImageUpdate->update();
        }


    

        return redirect('stores/miPerfil')->with('success', 'Se han modificado los datos Correctamente');
    }
}
