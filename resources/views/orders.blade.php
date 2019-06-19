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
    <br>
    <h1> <a href="{{ url('home') }}"> Laravel 5.8 Datatables Tutorial  </a></h1>
    <br>
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

            ajax: "{{ route('orders.index') }}",

            columns: [

                {data: 'DT_RowIndex', name: 'DT_RowIndex'},

                {data: 'item', name: 'item'},

                {data: 'customer_id', name: 'customer_id'},

                {data: 'action', name: 'action', orderable: false, searchable: false},

            ]

        });



    });

</script>

</html>