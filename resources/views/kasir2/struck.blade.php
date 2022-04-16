@php
$data = $data['data'];
@endphp

@php
$loopnin = json_decode($data->pesanan);
@endphp

@extends('kasir2.master')
@section('content')
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        /*body {
                                                                                                background-color: #ffe8d2;
                                                                                                font-family: 'Montserrat', sans-serif
                                                                                                }*/

        .card {
            border: none
        }

        .logo {
            background-color: #eeeeeea8
        }

        .totals tr td {
            font-size: 13px
        }

        .footer {
            background-color: #eeeeeea8
        }

        .footer span {
            font-size: 12px
        }

        .product-qty span {
            font-size: 12px;
            color: #dedbdb
        }

    </style>
    <div class="section full mt-2">
        <div class="container mt-5 mb-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="text-left logo p-2 px-5">
                            <img src="https://trykasir.lgarin211.my.id/assets/img/icon/192x192.png" width="50">
                        </div>
                        <div class="invoice p-5">
                            <h5>Your order</h5>
                            <span class="font-weight-bold d-block mt-4">Hello, {!! $data->crn !!}</span>
                            <span>You order has been confirmed and we hopefull happy for you, come again!</span>
                            <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="py-2">
                                                    <span class="d-block text-muted">Order Date</span>
                                                    <span>{{ $data->created_at }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="py-2">
                                                    <span class="d-block text-muted">Order No</span>
                                                    <span>{{ $data->id }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="py-2"> <span class="d-block text-muted">Payment</span>
                                                    <span>
                                                        {{ $data->crn }}
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="product border-bottom table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        @php
                                            $totalharga = 0;
                                            $tax=($data->total_harga*10)/100;
                                        @endphp
                                        @foreach ($loopnin as $key => $item)
                                            @php
                                                $totalharga += $item->total_price;
                                            @endphp
                                            <tr>
                                                <td width="20%">
                                                    <img src="{!! $item->img !!}" width="90">
                                                </td>
                                                <td width="60%">
                                                    <span class="font-weight-bold">{{ $item->produk }}</span>
                                                    <div class="">
                                                        <span class="d-block">Quantity :
                                                            {!! $item->quantity !!}</span>
                                                        <span>Harga : {!! $item->priceone !!}</span>
                                                    </div>
                                                </td>
                                                <td width="20%">
                                                    <div class="text-right">
                                                        <span class="font-weight-bold">{{ $item->total_price }}</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="col-md-5">
                                    <table class="table table-borderless">
                                        <tbody class="totals">
                                            <tr>
                                                <td>
                                                    <div class="text-left">
                                                        <span class="text-muted">Subtotal</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-right">
                                                        <span>{{$totalharga}}</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="text-left">
                                                        <span class="text-muted">Tax Fee</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-right">
                                                        <span>{{$tax}}</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="border-top border-bottom">
                                                <td>
                                                    <div class="text-left">
                                                        <span class="font-weight-bold">Subtotal</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-right">
                                                        <span class="font-weight-bold">Rp. {{$tax+$data->total_harga}}</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p>We will be sending shipping confirmation email when the item shipped
                                        successfully!</p>
                                    <p class="font-weight-bold mb-0">Thanks for shopping with us!</p> <span>Nike
                                        Team</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
