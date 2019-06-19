<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use DataTables;


class OrderController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Order::latest()->get();

            return Datatables::of($data)

                ->setRowClass('{{ $id % 2 == 0 ? "alert-success" : "alert-warning"}}')

                ->setRowAttr([
                    'id' => 'x-sample-syle-id',
                    'align' => 'right',
                ])

                ->setRowData(['data-name' => ' Dhanushka -{{$item}}',])

                ->addIndexColumn()

                ->addColumn('action', function($row){



                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';



                    return $btn;

                })

                ->rawColumns(['action'])

                ->make(true);

        }
        return view('orders');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Order $order)
    {
        //
    }


    public function edit(Order $order)
    {
        //
    }


    public function update(Request $request, Order $order)
    {
        //
    }


    public function destroy(Order $order)
    {
        //
    }
}
