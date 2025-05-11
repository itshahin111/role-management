@extends('backend.layout.app')
@section('content')
    <!-- start-content -->

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Tables</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Product Table</li>
                </ol>
            </nav>
        </div>
        @can('product-create')
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">Create Product</a>
                </div>
            </div>
        @endcan
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Product List</h6>
    <hr>
    @can('product-list')
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                        <div id="myTable_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                            <div class="row mt-2 justify-content-between">
                                <div
                                    class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto">
                                </div>
                                <div class="row mt-2 justify-content-between dt-layout-table">
                                    <div
                                        class="d-md-flex justify-content-between align-items-center col-12 dt-layout-full col-md">
                                        <table id="myTable" class="display table table-striped dataTable"
                                            aria-describedby="myTable_info" style="width: 100%;">

                                            <thead>
                                                <tr>
                                                    <th>No </th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Price</th>
                                                    <th>Image</th>
                                                    <th>Quantity</th>
                                                    <th>Action</th>
                                                    {{-- <th>Category</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    @foreach ($products as $product_key => $product)
                                                        <td>{{ $product_key + 1 }}</td>
                                                        <td>{{ $product->name }}</td>
                                                        <td>{{ $product->description }}</td>
                                                        <td>{{ $product->price }}</td>
                                                        <td>
                                                            <img src="{{ asset('storage/' . $product->image) }}" alt=""
                                                                style="width: 50px; height: 50px;">
                                                        </td>
                                                        <td>{{ $product->quantity }}</td>
                                                        <td>
                                                            @can('product-edit')
                                                                <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                                                            @endcan
                                                            @can('product-delete')
                                                                <form action="{{ route('products.destroy', $product->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Are you sure you want to delete this product?')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                            @endcan
                                                        </td>
                                                </tr>
                                                @endforeach
                                                </td>
                                                </tr>
                                            </tbody>
                                            <tfoot></tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mt-2 justify-content-between">
                                </div>
                                <div class="dt-autosize" style="width: 100%; height: 0px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        <!-- end-content -->
    @endsection
