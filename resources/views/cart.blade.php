@extends('layouts.master')
@section('content')
@php
    $total = 0;     
@endphp
<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>{{$cart->count()}} Item</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th class="text-center">Subtotal</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $item)
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-4 hidden-xs ml-2"><img src="admin/assets/img/cart.svg" alt="..."
                                            class="img-responsive" /></div>
                                    <div class="col-sm-8 mt-4 text-center">
                                        <h6 class="nomargin text-md text-muted text-center">{{$item->product_code}}</h6>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">Rp. @money($item->price)</td>
                            <td data-th="Quantity">
                                <input type="number" class="form-control text-center" value="1"><p class="text-center"> {{$item->unit}}</p>
                            </td>
                            <td data-th="Subtotal" class="text-center">Rp. @money($item->price)</td>
                        </tr>
                        @php
                            $total += ($item->price * $item->quantity/2)
                        @endphp
                        @endforeach
                        <tr class="mt-5" style="margin-top:5em">
                            <td><a href="{{ url('/dashboard') }}" class="btn btn-sm btn-success"><i class="fa fa-angle-left"></i> Belanja Lagi</a></td>
                            <td colspan="2" class="hidden-xs"></td>
                            <td class="hidden-xs text-center"><strong>Rp. @money($total)</strong></td>
                        </tr>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
