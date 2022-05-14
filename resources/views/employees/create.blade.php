@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-8 mx-auto">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>Employee Section</h1>

           <div class="bg-info">
            <form action="{{ url('employee/store') }}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Ernter your first_name" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">enter your first_name</small>
                          </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="last_name" name="last_name" id="last_name" class="form-control" placeholder="Ernter your last_name" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">enter your last_name</small>
                          </div>
                          <div class="form-group">
                            <label for="">Select Companies</label>
                            <select class="form-control" name="company_id" id="">
                              <option value="">Select Companies</option>
                              @foreach($companies as $item){
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                          </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Ernter your email" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">enter your email</small>
                          </div>
                        <div class="form-group">
                            <label for="Phone">Phone</label>
                            <input type="text" name="phone" id="Phone" class="form-control" placeholder="Ernter your Phone" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">enter your Phone</small>
                          </div>
                        <div class="form-group">
                            <label for="city">city</label>
                            <input type="text" name="city" id="city" class="form-control" placeholder="Ernter your city" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">enter your city</small>
                          </div>
                        <div class="form-group">
                            <label for="join_date">Joining Date</label>
                            <input type="date" name="join_date" id="join_date" class="form-control" placeholder="Ernter your join_date" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">enter your join_date</small>
                          </div>

                          <button type="submit">Submit</button>
                    </div>
                </div>

            </form>
           </div>
        </div>
    </div>
</div>

@endsection
