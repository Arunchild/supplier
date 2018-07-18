<?php

namespace Supplier\Http\Controllers;


use App\Http\Controllers\Controller;

use Supplier\Models\Supplier;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items = Supplier::all();
        //$items = ['test'];
        return view('supplier::index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'companyname' 	=> 'required',
            'addressline1' 	=> 'required',
            'addressline2' 	=> 'required'
        ]);

        $input = $request->all();

        Supplier::create($input);

        session()->flash('flash_message', 'Supplier successfully added!');

        //TODO: redirect to company list page
        return redirect()->route('supplier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Supplier::find($id);
        return view('supplier::edit')->withitems($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Supplier::find($id);

        $this->validate($request, [
            'companyname' 	=> 'required',
            'addressline1' 	=> 'required',
            'addressline2' 	=> 'required'
        ]);

        $input = $request->all();

        $item->fill($input)->save();

        session()->flash('flash_message', 'Supplier successfully updated!');

        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Supplier::find($id);

        $item->delete();

        session()->flash('flash_message', 'Supplier successfully deleted!');

        return redirect()->route('supplier.index');
    }
}