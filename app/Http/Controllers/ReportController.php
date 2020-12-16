<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\shop;
use Cookie;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        // SHOP ID
        $shopId = Session::get('shopId');

         //today's transactions
        // today's Date 
        $today = date("Y-m-d");

        //all transactions
        $trans = Order::whereDate('created_at', $today)->WHERE('country_id','=',$shopId)->get();
      
        $completeSalesAmt = 0.00;
        $completeSalesProducts = 0;
        $cancelledSalesAmt = 0.00;
        $cancelledSalesProducts = 0;
        $pendingSalesAmt = 0.00;
        $pendingSalesProducts = 0;
        $otherSalesAmt = 0.00;
        $otherSalesProducts = 0;
        $reportType = "today";


        foreach ($trans as $key => $tran) {
           
            if($tran->complete_status == "Completed"){

                $completeSalesAmt = $completeSalesAmt + $tran->totalamount;
                $completeSalesProducts = $completeSalesProducts + $tran->quantity;

            }elseif($tran->complete_status == "Cancelled"){

                $cancelledSalesAmt = $cancelledSalesAmt + $tran->totalamount;
                $cancelledSalesProducts = $cancelledSalesProducts + $tran->quantity;

            }elseif($tran->complete_status == "pending"){

                $pendingSalesAmt = $pendingSalesAmt + $tran->totalamount;
                $pendingSalesProducts = $pendingSalesProducts +  $tran->quantity;

            }else{

                $otherSalesAmt = $otherSalesAmt + $tran->totalamount;
                $otherSalesProducts = $otherSalesProducts +  $tran->quantity;

            }

        }

        
        //###################  PAGE NAME #########################
            $page = "report";

        //###################  ALL SHOPS #########################
            $allShops = shop::all();
            return view('admin.report.index',compact(

                'trans','page',
                'allShops',
                'completeSalesAmt',
                'completeSalesProducts',
                'cancelledSalesAmt',
                'cancelledSalesProducts',
                'pendingSalesAmt',
                'pendingSalesProducts',
                'otherSalesAmt',
                'otherSalesProducts',
                'reportType'

            ));
    }



    public function search($search)
    {
        // SHOP ID
        $shopId = Session::get('shopId');

        if($search == "today"){

            // today's Date 
            $today = date("Y-m-d");
            $trans = Order::whereDate('created_at', $today)->WHERE('country_id','=',$shopId)->get();

        }elseif($search == "week"){

            //  Week's transactions 
            $today = getdate();
            $curMonth =  date("m");
            $weekStartDate = $today['mday'] - $today['wday'];
            $weekEndDate = $today['mday'] - $today['wday']+6;

            $trans = Order::whereMonth('created_at', '=', $curMonth)->whereDay('created_at', '>=' ,$weekStartDate)->whereDay('created_at', '<=' ,$weekEndDate)->WHERE('country_id','=',$shopId)->get();

        }elseif($search == "month"){

            //   MONTH TRANSACTION
            $curMonth =  date("m");
            $trans = Order::whereMonth('created_at', '=', $curMonth)->WHERE('country_id','=',$shopId)->get();


        }elseif($search == "year"){

            // YEAR TRANSACTION 
            $curyear =  date("Y");
            $trans = Order::whereYear('created_at', '=', $curyear)->WHERE('country_id','=',$shopId)->get();

        }

        $completeSalesAmt = 0.00;
        $completeSalesProducts = 0;
        $cancelledSalesAmt = 0.00;
        $cancelledSalesProducts = 0;
        $pendingSalesAmt = 0.00;
        $pendingSalesProducts = 0;
        $otherSalesAmt = 0.00;
        $otherSalesProducts = 0;
        $reportType = $search;


        foreach ($trans as $key => $tran) {
           
            if($tran->complete_status == "Completed"){

                $completeSalesAmt = $completeSalesAmt + $tran->totalamount;
                $completeSalesProducts = $completeSalesProducts + $tran->quantity;

            }elseif($tran->complete_status == "Cancelled"){

                $cancelledSalesAmt = $cancelledSalesAmt + $tran->totalamount;
                $cancelledSalesProducts = $cancelledSalesProducts + $tran->quantity;

            }elseif($tran->complete_status == "pending"){

                $pendingSalesAmt = $pendingSalesAmt + $tran->totalamount;
                $pendingSalesProducts = $pendingSalesProducts +  $tran->quantity;

            }else{

                $otherSalesAmt = $otherSalesAmt + $tran->totalamount;
                $otherSalesProducts = $otherSalesProducts +  $tran->quantity;

            }

        }

    
        //###################  PAGE NAME #########################
         $page = "report";
        //###################  ALL SHOPS #########################
        $allShops = shop::all();
        return view('admin.report.index',compact(

            'trans','page',
            'allShops',
            'completeSalesAmt',
            'completeSalesProducts',
            'cancelledSalesAmt',
            'cancelledSalesProducts',
            'pendingSalesAmt',
            'pendingSalesProducts',
            'otherSalesAmt',
            'otherSalesProducts',
            'reportType'

        ));
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
}
