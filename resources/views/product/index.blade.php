@extends('layout.master')

@section('heading','Product Data')
@section('content')
<section class="section" id="form-and-scrolling-components">
    <div class="card">
        <div class="card-header">
            Products Datatable
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">
                    Add Product
                </button>
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Id</th>
                            <th>Category Name</th>
                            <th>Category Id</th>
                            <th>Qty</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->category->name}}</td>
                                <td>{{$item->category_id}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>
                                    <a href="" type="button" class="btn btn-sm rounded-pill btn-warning">
                                        Edit
                                    </a>
                                    <form action="" method="POST" class=" d-inline">
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
        <div class="modal fade text-left" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Add Product Form </h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="{{route('product.store')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="col-md-6 mb-4">
                                <h6></h6>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Category</label>
                                    <select class="form-select" id="inputGroupSelect01" name="category_id">
                                        <option selected>Choose...</option>
                                        @foreach ($category as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label>Id : </label>
                            <div class="form-group">
                                <input type="text" placeholder="" name="id" class="form-control">
                            </div>
                            <label>Product Name : </label>
                            <div class="form-group">
                                <input type="text" placeholder="" name  ="name" class="form-control">
                            </div>
                            <label>Qty: </label>
                            <div class="form-group">
                                <input type="text" placeholder="" name  ="quantity" class="form-control">
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