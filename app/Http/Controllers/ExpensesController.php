<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $expenses;

    public function __construct()
    {
        $this->expenses = new Expenses;
    }

    public function index()
    {
        //
        $data["expenses"] = $this->expenses->get();
        return view("expenses.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->except("_token");
        $data["created_at"] = now();
        Expenses::insert($data);
        return redirect('expenses')->with("message","Gasto agregado exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function show($expense_id)
    {
        //

        $response = Expenses::findOrFail($expense_id);
        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function edit(Expenses $expenses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $expense_id)
    {
        //
        $data = $request->except('_token','_method');
        $data["updated_at"] = now();

        Expenses::where('id', "=", $expense_id)->update($data);
        return redirect('expenses')->with("message","Gasto actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete = Expenses::destroy($id);
        if($delete != 1){
            $message = array("error"=> "Ocurrio un error al eliminar el gasto o no esta establecido en la base de datos");
        }else{
            $message = array("message"=> "Gasto eliminado ");

        }
        return redirect('expenses')->with($message);

        // return response($id);
    }
}
