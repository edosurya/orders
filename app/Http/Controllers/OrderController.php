<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use \App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use DB;

class OrderController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {   
        $payment = $request->get('payment');

        $orders = Order::orderBy('date', 'DESC')->orderBy('name','DESC');

        if($payment){
            $orders = $orders->where("payment", "$payment");
        }

        $orders = $orders->get();

        return view('orders.index', ['orders' => $orders]);
    }

    public function search(Request $request)
    {   
        $q          = $request->get('q');
        $date       = $request->get('date');
        $name       = $request->get('name');

        if($date) {
            $orders = Order::orderBy('date', $date);
        }elseif($name){
             $orders = Order::orderBy('name', $name);
        } else {
             $orders = Order::orderBy('date', 'DESC')->orderBy('name','DESC');
        }

        if($q){
            $orders = $orders->where("invoice_number", "LIKE", "%$q%")->orWhere("name", "LIKE", "%$q%");
        }
        
        $orders = $orders->get();
        
        return $orders;
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
        $request = $request->all();

        // Order::create($request);

        $order = New Order;

        $order->name = $request['name'];
        $order->email = $request['email'];
        $order->telp = $request['telp'];
        $order->payment = $request['payment'];
        $order->fulfillment = $request['fulfillment'];
        $order->date = date("Y-m-d H:i:s");
        $order->invoice_number = $this->generateRandomString();
        $order->total_pembayaran =  $request['total'];

        $order->save();

        return redirect()->route('home');
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
        $order = Order::findOrFail($id);
        dd($order);
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
        $request = $request->all();

        $order = Order::findOrFail($id);

        $order->name = $request['name'];
        $order->email = $request['email'];
        $order->telp = $request['telp'];
        $order->payment = $request['payment'];
        $order->fulfillment = $request['fulfillment'];
        $order->total_pembayaran =  $request['total'];

        $order->save();

        return redirect()->route('home');
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


    public function generateRandomString($length = 8) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
