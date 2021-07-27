<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $DashboardModel;
    private $dates;

    public function __construct(){
        $this->DashboardModel = new Dashboard;
    }

    public function index()
    {
        //
        if(!file_exists(public_path('storage'))){
            Artisan::call('storage:link');
        }
        return view('dashboard.index');
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

        $data = $request->input();
        return response()->json($data, 200);
        //
    }


    public function getInformation(Request $request){
        $dates = $request->except('_method');
        $data['sales'] = $this->getSales($dates);
        $data['employees'] = $this->getEmployees($dates);
        $data['productsSales'] = $this->getProductsSales($dates);
        $data['totalSales'] = $this->getAllsales($dates);
        $data['totalExpenses'] = $this->getExpenses($dates);
        return response()->json($data, 200);
    }

    public function getSales($dates){
        return $this->DashboardModel->getSales($dates);
    }

    public function getEmployees($dates){
        return $this->DashboardModel->getEmployees($dates);
    }

    public function getProductsSales($dates){
        return $this->DashboardModel->getProductsSales($dates);
    }


    public function getAllsales($dates){
        return $this->DashboardModel->getAllsales($dates);
    }

    public function getExpenses($dates){
        return $this->DashboardModel->getExpenses($dates);
    }


    

}
