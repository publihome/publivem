<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $Sales;

     public function __construct()
     {
         $this->Sales = new Sales;
         
     }
    public function index()
    {
        //

        return view('sales.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $data["categories"] = DB::table('categories')->get();
        $data["employees"] = Employees::where('remove',false)->get();
        return view('sales.add', $data);
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
        $data = $request->only('order', 'client_name', 'employe_id','advance', 'amount_all', 'payment_format');
        $data["created_at"] = now();

        if(Sales::insert($data) == 1){
            $req = $request->only('productsData');
            $products = json_decode($req["productsData"]);

            $sale_id = Sales::latest('id')->first();
            for($i = 0 ; $i < count($products); $i++){
                foreach($products[$i] as $product){
                    $height = 0; 
                    $width = 0;
                        if(isset($product->width)){
                            $height = $product->height; 
                            $width = $product->width;
                        }
                    DB::table('sales_details')->insert([
                        'sale_id' => $sale_id->id,
                        'product_id' => $product->id,
                        'heigth' => $height,
                        'width' => $width,
                        'amount' => $product->amount,
                        'sides' => $product->sides == "" ? null : intval($product->sides) 
                    ]);
                }
            }
            return response()->json("venta generada", 200);
        }
        return response()->json("ocurrio un error", 500);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['sales_details'] = $this->Sales->getSalesBySale_id($id) ;
        $data['sales'] = $this->Sales->getSaleById($id);
        return view('sales.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->except('_token','_method');
        $Sale = Sales::findOrFail($id);
        $newAmount = $Sale->advance + $data['advance'];
        if($newAmount > $Sale->amount_all ){
            return redirect('sales/'.$id.'/edit')->with("error","La cantidad ingresada es mayor al total de la compra");
        }
        $data["advance"] =  $newAmount;
        $sql = Sales::where('id', '=', $id)->update($data);
        if($sql != 1){
            return redirect('sales/'.$id.'/edit')->with("error","No se completo la transacción intentalo mas tarde");
        }else{
            return redirect('sales/'.$id.'/edit')->with("message","Transaccion realizada con exito");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
        //
    }

    public function getSales(){
        $sales = $this->Sales->getSales();
        return response()->json($sales, 200);
    }
}
