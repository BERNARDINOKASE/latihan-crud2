@extends('layout.master')

@section('heading', 'Categories Data')
@section('content')
<section class="section" id="form-and-scrolling-components">
    <div class="card">
        <div class="card-header">
                Categori Datatable
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addCategori">
                    Add Categori
                </button>
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Id</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->id}}</td>
                                <td>
                                    <a href="{{route('kategori.edit', $item->id)}}" type="button" class="btn btn-sm rounded-pill btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{route('kategori.destroy', $item->id)}}" method="POST" class=" d-inline">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" name="submit" class="btn btn-sm rounded-pill btn-danger ">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--Add Category form Modal -->
        <div class="modal fade text-left" id="addCategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Add Categori Form </h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="{{route('kategori.store')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label>Id : </label>
                            <div class="form-group">
                                <input type="text" placeholder="" name="id" class="form-control">
                            </div>
                        <label>Categori Name : </label>
                            <div class="form-group">
                                <input type="text" placeholder="" name  ="name" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            
                            <button type="submit" id="success" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Save</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Tables end -->
    
@endsection