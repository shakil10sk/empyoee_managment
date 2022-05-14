<!doctype html>
<html lang="en">
  <head>
    <title>Employee List</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">


  </head>
  <body>

    <div class="container pt-5">
        <a class="btn btn-md btn-success" href="{{ url('/home') }}">Home</a>
        <div class="row">
            <div class="col-md-12 mx-auto bg-info">
            <h1>Employee List</h1>
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>Si</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>email</th>
                        <th>Company Name</th>
                        <th>Joining Date</th>
                        <th>City</th>
                        <th>logo</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach($list as $key=>$item)
                    <tr>
                        <th>{{ $key++ }}</th>
                        <th>{{ $item->first_name }} {{$item->last_name}}</th>
                        <th>{{ $item->EmpPhone }}</th>
                        <th>{{$item->EmpEmail}}</th>
                        <th>{{$item->company_name}}</th>
                        <th>{{$item->join_date}}</th>
                        <th>{{$item->city}}</th>
                        <th><img src="{{asset('iamges/'.$item->logo)}}" class="img img-fluid" width="100px" height="100px" alt=""></th>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {

              $("#dataTable").dataTable({
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
                serverSide: true,
                processing: true,
                ajax: {
                    dataType: "JSON",
                    type: "get",
                    url: "{{ url('employee/list') }}",
                    data: {

                    },
                },
                columns: [
                        {
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                       { data: 'name' },
                       { data: 'EmpPhone'},
                       { data: 'EmpEmail' },
                       { data: 'city' },
                       { data: 'company_name'},
                       { data: 'join_date' },
                       { data: 'logo',
                        render: function(data) {
                            if (data != null) {
                                return "<img width='50' src='{{ asset('/iamges') }}/" + data +"' class='img-circle img-responsive' />";
                            } else
                            {
                                return "<img width='50' alt='Logo' src='' class='img-circle img-responsive' />";

                            }
                        }
                     },
                    ],
                });
        });

    </script>
  </body>
</html>
