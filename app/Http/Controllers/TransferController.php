<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transfer;
use App\Models\TransferItem;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transfers = Transfer::all();

        return view('index-transfer', compact("transfers"));
    }

    public function download($transferId) {
        $transfer = Transfer::find($transferId);

        $pdf = Pdf::loadView('pdf', ['data' => $transfer]);     
        return $pdf->download();
        // return view('pdf', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();

        return view('create-transfer', compact("products"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(1);

        $products = $request->products;

        $transfer = Transfer::create([
            "status" => "Requesting",
            "requestor_id" => $user->id
        ]);
        // $transfer->requestor()->associate($user)->save();

        $transfer->products()->attach($products);

        // foreach ($products as $product) {

        //     $transfer->products()->associate($product)->save();
        // }



        // dd($request->all());


        return redirect(url("/transfer"));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($transferId)
    {
        $transfer = Transfer::find($transferId);
        return view('detail-transfer', compact("transfer"));
    }

    public function approval($transferId)
    {
        $transfer = Transfer::find($transferId);
        $transfer->update(["status" => "Done"]);

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function edit(Transfer $transfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transfer $transfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transfer $transfer)
    {
        //
    }
}
