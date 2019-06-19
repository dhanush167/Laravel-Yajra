<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

**Laravel  5.8**

We need to install yajra datatable composer package for datatable, so you can install using following command:

    composer require yajra/laravel-datatables-oracle

After that you need to set providers and alias.
config/app.php

    .....
    
    'providers' => [
    
    	....
    
    	Yajra\DataTables\DataTablesServiceProvider::class,
    
    ]
    
    'aliases' => [
    
    	....
    
    	'DataTables' => Yajra\DataTables\Facades\DataTables::class,
    
    ]
    
    .....


In this step, we will create some dummy users using tinker factory. so let's create dummy records using bellow command:


    php artisan tinker
    
    factory(App\User::class, 200)->create();

In this is step we need to create route for datatables layout file and another one for getting data. so open your routes/web.php file and add following route

    Route::get('users', ['uses'=>'UserController@index', 'as'=>'users.index']);

.
In this point, now we should create new controller as UserController. this controller will manage layout and getting data request and return response, so put bellow content in controller file:

    <?php
    
    namespace App\Http\Controllers;
    
    use App\User;
    
    use Illuminate\Http\Request;
    
    use DataTables;
    
    class UserController extends Controller
    
    {
    
        /**
    
         * Display a listing of the resource.
    
         *
    
         * @return \Illuminate\Http\Response
    
         */
    
        public function index(Request $request)
    
        {
    
            if ($request->ajax()) {
    
                $data = User::latest()->get();
    
                return Datatables::of($data)
    
                        ->addIndexColumn()
    
                        ->addColumn('action', function($row){
    
                               $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
    
                                return $btn;
    
                        })
    
                        ->rawColumns(['action'])
    
                        ->make(true);
    
            }
    
            return view('users');
    
        }
    
    }


In Last step, let's create users.blade.php(resources/views/users.blade.php) for layout and we will write design code here and put following code:

    <!DOCTYPE html>
    
    <html>
    
    <head>
    
        <title>Laravel 5.8 Datatables Tutorial - ItSolutionStuff.com</title>
    
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    
    </head>
    
    <body>
    
    <div class="container">
    
        <h1>Laravel 5.8 Datatables Tutorial <br/> HDTuto.com</h1>
    
        <table class="table table-bordered data-table">
    
            <thead>
    
                <tr>
    
                    <th>No</th>
    
                    <th>Name</th>
    
                    <th>Email</th>
    
                    <th width="100px">Action</th>
    
                </tr>
    
            </thead>
    
            <tbody>
    
            </tbody>
    
        </table>
    
    </div>
    
    </body>
    
    <script type="text/javascript">
    
      $(function () {
    
        var table = $('.data-table').DataTable({
    
            processing: true,
    
            serverSide: true,
    
            ajax: "{{ route('users.index') }}",
    
            columns: [
    
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
    
                {data: 'name', name: 'name'},
    
                {data: 'email', name: 'email'},
    
                {data: 'action', name: 'action', orderable: false, searchable: false},
    
            ]
    
        });
    
      });
    
    </script>
    
    </html>
