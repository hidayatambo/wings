@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Product List</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <tbody>
                                @foreach ($product as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <a href="" data-id="{{ $item->id }}" class="detail"
                                                        data-bs-toggle="modal">
                                                        <img src="admin/assets/img/cart.svg" class="avatar avatar-sm me-3"
                                                            alt="user1">
                                                    </a>
                                                </div>

                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $item->product_name }}</h6>
                                                    @if ($item->discount != null)
                                                        <p class="text-xs text-secondary mb-0"><del>Rp.
                                                                @money($item->price / $item->discount)</del> </p>
                                                    @endif
                                                    {{-- <p class="text-xs text-secondary mb-0"><del>Rp. @money($item->discount)</del> </p>              --}}
                                                    <h6 class="mb-0 text-sm">Rp. @money($item->price)</h6>
                                                </div>

                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                        <form action="/cart" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input value="{{$item->id}}" name="id" type="hidden">
                                            <input value="{{$item->product_code}}" name="product_code" type="hidden">
                                            <input value="{{$item->product_name}}" name="product_name" type="hidden">
                                            <input value="{{$item->price}}" name="price" type="hidden">
                                            <input value="{{$item->currency}}" name="currency" type="hidden">
                                            <input value="{{$item->discount}}" name="discount" type="hidden">
                                            <input value="{{$item->dimension}}" name="dimension" type="hidden">
                                            <input value="{{$item->unit}}" name="unit" type="hidden">
                                            <button type="submit" class="btn btn-sm bg-gradient-success" >Add To Cart</button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                            <tbody>
                                {{-- <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="admin/assets/img/soklin.jpeg" class="avatar avatar-sm me-3"
                                                    alt="user2">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">SO klin</h6>
                                                <p class="text-xs text-secondary mb-0"><del>Rp. 50.000</del> </p>
                                                <h6 class="mb-0 text-sm">RP. 28.000</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-success">Buy</span>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modal.detail-product')

@endsection
