@extends('layout.master')
@section('heading' ,'Edit Category')
    
@section('content')
    
    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Horizontal Form</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form method="POST" action="{{route('kategori.update', $data->id)}}" class="form form-horizontal">
                                @csrf
                                @method("PUT")
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Id</label>
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <input type="text" id="id" class="form-control" name="id" value="{{$data->id}}">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <input type="text" id="name" class="form-control" name="name" value="{{$data->name}}">
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-start">
                                            <a href="{{route('kategori.index')}}" type="button" class="btn btn-secondary me-1 mb-1">Back</a>
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic Horizontal form layout section end -->
@endsection