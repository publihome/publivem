<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $productsModel;

    public function __construct()
    {
        $this->productsModel = new Products;

    }
    public function index()
    {
        //
        $data["categories"] = $this->productsModel->categories();
        return view('products.index',$data);
    }

    public function producstByCategory($id){

        $data["categoryName"]= $this->productsModel->getNameCategory($id);
        if(count($data["categoryName"]) == 0){
            return redirect('products_by_category')->with('error','Lo siento, no existe esa categoria');

        }
        $data["papers"] = $this->productsModel->getPapers();
        

        return view('products.products',$data);
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
        
        if($request->has('papel_id')){
            $dataProduct = $request->input();
        }else{
            $dataProduct = $request->only('category_id','name','price_men', 'unit');
            $dataattrib = $request->except('category_id','name','price_men', 'unit');
        }


        $this->productsModel->addProduct($dataProduct);
        $id_product = Products::latest('id')->first();
        if(isset($dataattrib)){
            foreach($dataattrib as $attr => $item){
                $id_attrib = $this->productsModel->getAttrbyName($attr);
                $this->productsModel->insertAttr($id_attrib[0],$id_product->id,$item);
            }
        }
        return response()->json('ok', 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($category_id)
    {
        //
        $products = $this->productsModel->getProductsBycategory($category_id);
        $attributes = $this->productsModel->getAtributtesbycategory($category_id);
       
        $data['products'] = $products;
        
        $data['attributes'] = $attributes;
        
        return response()->json($data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id, $product_id)
    {
        //
        $data["products"] = $this->productsModel->getProductsByIdAndIdCategory($category_id, $product_id);
        $data["attributes"] = $this->productsModel->getAtributtesbyIdAndIdCategory($category_id, $product_id);
        return response()->json($data, 200);
        


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $req = $request->only('category_id','name','price_men', 'unit');
        return response()->json($req, 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        //
        $this->productsModel->deleteAtributesProduct($product_id);
        $this->productsModel->deleteProducts($product_id);
        return response()->json($product_id, 200);
    }
}
