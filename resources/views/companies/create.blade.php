@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-8 mx-auto ">
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
        <h1>Company Section</h1>

            <div class="bg-info">
                <form action="{{ url('company/store') }}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Ernter your name" aria-describedby="helpId">
                                <small id="helpId" class="text-muted">enter your name</small>
                              </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Ernter your email" aria-describedby="helpId">
                                <small id="helpId" class="text-muted">enter your email</small>
                              </div>
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" name="logo" id="logo">
                              </div>
                            <div class="form-group">
                                <label for="website">website</label>
                                <input type="text" name="website" id="website" class="form-control" placeholder="Ernter your website" aria-describedby="helpId">
                                <small id="helpId" class="text-muted">enter your website</small>
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
