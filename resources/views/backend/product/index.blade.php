@extends('backend.layouts.app')

@section('title', 'Products')
@section('home_url', route('product.index'))
@section('page', ' ')

@section('content')

    <div class="content-body">
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Basic table -->
                            <section id="basic-datatable">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <table class="datatable table table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Product</th>
                                                        <th>Title</th>
                                                        <th>Category</th>
                                                        <th>Sub Category</th>
                                                        <th>Unit Price</th>
                                                        <th>Price</th>
                                                        <th>Discount</th>
                                                        <th>Quantity</th>
                                                        <th>Featured</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    {{-- @foreach ($products as $i => $product)
                                                    <tr id="product-{{$product->id}}">
                                                        <td>{{$i + 1}}</td>
                                                        <td>
                                                            <img src="{{asset($product->photo)}}" class="w-75" alt="image">
                                                        </td>
                                                        <td>{{$product->title ?? '--'}}</td>
                                                        <td>
                                                            @if ($product->category->count() > 0)
                                                                <span class="badge badge-light-primary">{{$product->category->name ?? ''}}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($product->subcategory->count() > 0)
                                                            <span class="badge badge-light-secondary">{{$product->subcategory->name ?? ''}}</span>
                                                            @endif
                                                        </td>
                                                        <td>${{$product->unit_price ?? '--'}}</td>
                                                        <td>${{$product->admin_product_price ?? '--'}}</td>
                                                        <td>${{$product->discount ?? '--'}}</td>
                                                        <td>{{$product->quantity ?? '--'}}</td>
                                                        <td>
                                                            @if ($product->is_featured == 1)
                                                                <span class="badge badge-light-success">Yes</span>
                                                            @else
                                                                <span class="badge badge-light-warning">No</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($product->status == 1)
                                                                <span class="badge badge-light-success">Active</span>
                                                            @else
                                                                <span class="badge badge-light-warning">Inactive</span>
                                                            @endif
                                                        </td>

                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-end" style="">
                                                                    <a class="dropdown-item" href="{{route('product.edit',[$product->id])}}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 me-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                                        <span>Edit</span>
                                                                    </a>

                                                                    <a class="dropdown-item w-100" type="button" onclick="sendAjaxOnDelete('{{route('product.destroy',[$product->id])}}','GET',{{$product->id}},'#product-{{$product->id}}')">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash me-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                                                        Delete
                                                                    </a>

                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </section>
                            <!--/ Basic table -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection



@push('script')
    @include('scripts.backend.product.indexjs')
@endpush
