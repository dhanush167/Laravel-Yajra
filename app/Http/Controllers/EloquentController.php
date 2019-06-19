<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;

use App\Order;

class EloquentController extends Controller

{



    public function index()

    {

        return view('eloquent');

    }



    public function getData()

    {

        return Datatables::of(Order::query())

            ->setRowClass('{{ $id % 2 == 0 ? "alert-info" : "alert-danger"}}')

            ->setRowId(function ($user) {
                return $user->id;
            })

            ->setRowData(['data-name' => 'Dhanushka-{{$item}}',])


            ->addColumn('customer', function(Order $item) {
                return 'Hi ' . $item->customer->name . '!';
            })




            ->make(true);




    }

}
