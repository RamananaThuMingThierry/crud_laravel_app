<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customers::orderBy('id','DESC')->get();
        return response()->json($customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customers = new Customers;
        $customers->create($request->all());
        return response()->json(["L'enregistrement effectuée!"], 200);
    }   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customers = Customers::find($id);
        if($customers == null){
            return response()->json(["Aucun résultat!"]);
        }else{
            return response()->json($customers);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $customers = Customers::find($id);
        if($customers == null){
            return response()->json(["Aucun résultat!"], 200);
        }else{
            if($customers->update($request->all())){
                return response()->json(
                    ['success' => 'Modification effectuée!'], 200
                );
            }
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customers = Customers::find($id);
        if($customers == null){
            return response()->json(["Aucun résultat!"]);
        }else{
            $customers->delete();
            return response()->json(["Suppression avec succès!"], 200);    
        }
    }
}
