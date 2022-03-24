        @extends('kasir.master.master')
            @section('item')
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <style>
                        .produk{
                            max-height: 250px;
                            min-height: 250px;
                            object-fit: cover;
                        }
                    </style>
                    @foreach ($data['data'] as $key=>$index)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top produk" src="{{url('/cs1/'.$index->img_item)}}" >
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{$index->nama_item}}</h5>
                                        <!-- Product price-->
                                        {{ $index->harga_item }}
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class="btn btn-outline-dark mt-auto" href="#" data-bs-toggle="modal" data-bs-target="#umami{{$key}}">View options</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- Modal umami{{$key}} -->
                    <div class="modal fade" id="umami{{$key}}" tabindex="-1" aria-labelledby="umami{{$key}}Label" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="umami{{$key}}Label">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @include('kasir.modalline1')
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
                <div class="text-center">
                        Total Belanja = <span id="spandex">0</span>
                </div>
            </div>
                <!-- Modal -->
                <div class="modal fade" id="chart" tabindex="-1" aria-labelledby="chartLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-lg modal-fullscreen">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @include('kasir.modalline2')
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{url('/tes1')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="data" id="mainkan">
                                    <input type="hidden" name="total" id="spark" value="0">
                                    <input type="hidden" name="crn" value="bawa pulang">
                                    <input type="hidden" name="nama" value="{{$_GET['nama']}}">
                                    <button class="btn btn-primary" type="submit">Save changes</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
            <script>
                var order=[]
                var total=0
                function ordermyitem(id) {
                    // console.log(id,total,order)
                    var produk=document.getElementById('produk'+id).value
                    var price=document.getElementById('price'+id).value
                    var quantity=document.getElementById('q'+id).value
                    var totalitem=price*quantity
                    // total=total+totalitem;

                    var item={
                        'id':id,
                        'produk':produk,
                        'quantity':quantity,
                        'priceone':price,
                        'total':totalitem
                    }

                    order.push(item)
                    pass();
                }

                function pass() {
                    var data=JSON.stringify(order)
                    var ami=''
                    total=0
                    for (let i = 0; i < order.length; i++) {
                        const arima = order[i];
                            total+=arima.priceone*arima.quantity
                            // console.log(total);
                        var img=document.getElementById('imgitem'+arima.id).src
                        // console.log(img)
                        ami+=`<div class="card mb-3" style="max-height: 100%" id="littelpin${i}">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="${img}" class="img-fluid" style="max-height: 250px;width: fit-content;object-fit: cover;">
                                </div>
                                <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">${arima.produk}</h5>
                                    <p class="card-text">sebanyak x ${arima.quantity} | total Harga : RP. ${arima.total}.</p>
                                    <button class="btn btn-warning col-md-12" onclick="mutialia(${i})">hapus</button>
                                </div>
                                </div>
                            </div>
                            </div>`
                    }
                    console.log(total)
                    document.getElementById('poincallchart').innerHTML=ami;
                    document.getElementById('nall').innerHTML=order.length;
                    document.getElementById('mainkan').value=data
                    document.getElementById('spark').value=total
                    document.getElementById('spandex').innerHTML=total

                }

                function mutialia(id) {
                    order.splice(id, 1);
                    pass();
                }
            </script>

@endsection
