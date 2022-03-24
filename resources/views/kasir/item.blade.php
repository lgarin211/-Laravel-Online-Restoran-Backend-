            @extends('kasir.master.master2')
            @section('item')
            <div class="row">
                <div class="col-8 float-end">
                    <div class="row">
                        @foreach ($data['data'] as $key=>$index)
                            <div class="col-md-4 ">
                                <div class="card dasw">
                                    <img src="{{url('cs1/'.$index->img_item)}}" class="card-img-top" alt="..." style='object-fit: cover;'>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$index->nama_item}}</h5>
                                        <p class="card-text">{!! $index->komposisi_item !!}</p>
                                        <p class="card-text">{{ $index->harga_item }}</p>
                                        <!-- <a href="#" class="btn btn-primary">Order</a> -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{'tagidnyadalah'.$key}}">Order</button>
                                    </div>
                                </div>
                            </div>
                            <!-- modal prodke {{$key}} -->
                                <!-- Modal -->
                            <div class="modal fade" id="{{'tagidnyadalah'.$key}}" tabindex="-1" aria-labelledby="{{'idnyadalah'.$key}}" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="{{'idnyadalah'.$key}}">Order {{$index->nama_item}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            {{$index->nama_item}} Sebanyak :
                                                        </div>
                                                        <div class="col-6">
                                                            <input type="number" class="form-control" id="{{'much'.$key}}">
                                                        </div>
                                                    </div>
                                                    <input type="hidden" value="{{$index->nama_item}}" id="{{'produk'.$key}}">
                                                    <input type="hidden" value="{{$index->harga_item}}" id="{{'price'.$key}}">
                                                </div>
                                                <div class="col-md-3">
                                                        <div class="card mb-3">
                                                            <img src="{{url('/storage/'.$index->img_item)}}" class="card-img-top" alt="..." style='object-fit: cover;'>
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{$index->nama_item}}</h5>
                                                                <p class="card-text">{!! $index->komposisi_item !!}.</p>
                                                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-primary" onclick=additem({{$key}})>Masukan</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-4">
                    <div class="row" id="Chart">
                        
                    </div>
                    <hr>
                    <div class="text-center">
                        Total Belanja = <span id="spandex">0</span>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{url('/tes1')}}" method="POST">
        @csrf
        <input type="text" name="data" id="mainkan">
        <input type="text" name="total" id="spark" value="0">
        <input type="text" name="crn" value="bawa pulang">
        <input type="text" name="nama" value="{{$_GET['nama']}}">
        <button type="submit">simpan</button>
        </form>
        <script>
            var arima=[]
            var total=0
            function additem(id) {
                var produk=document.getElementById('produk'+id).value;
                var much=document.getElementById('much'+id).value;
                document.getElementById('much'+id).value='';
                var price=document.getElementById('price'+id).value;
                var price=price*much;
                var ami=`<div class="col-md-12" id="littelpin${arima.length}">
                            <div class="row  text-center">
                                <div class="col-md-10">
                                    <p>${produk}</p>
                                    <hr>
                                    <p>sebanyak x ${much}| total Harga : RP. ${price}</p>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-warning" onclick="mutialia(${arima.length})">hapus</button>
                                </div>
                            </div>
                        </div>`
                document.getElementById('Chart').innerHTML+=ami;
                console.log(total);
                total+=parseInt(document.getElementById('spark').value)+price;
                console.log(total);
                document.getElementById('spark').value=total
                document.getElementById('spandex').innerHTML=total
                var akuma={
                    'produk':produk,
                    'much':much,
                    'price':price
                }
                
                arima.push(akuma)
                console.log(arima)
                var asuru=JSON.stringify(arima)
                // console.log(arima);
                document.getElementById('mainkan').value=asuru
            }
            function mutialia(id) {
                alert(id)
                // console.log(arima);
                arima.splice(id, 1);
                // console.table(arima);
                sessionStorage.setItem('data', arima);
                // reti(arima)
                let data = sessionStorage.getItem('data');
                // console.log()
                reti(data)
            }
            function reti(data) {
                var ami=''
                var kosmo=0
                for (let i = 0; i < data.length; i++) {
                    const igno = data[i];
                    // console.log(igno)
                    var ami=ami+`<div class="col-md-12" id="littelpin${i}">
                            <div class="row  text-center">
                                <div class="col-md-10">
                                    <p>${igno.produk}</p>
                                    <hr>
                                    <p>sebanyak x ${igno.much}| total Harga : RP. ${igno.price}</p>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-warning" onclick="mutialia(${i})">hapus</button>
                                </div>
                            </div>
                        </div>`
                    kosmo=kosmo+igno.price
                }
                total=total-(total-kosmo)
                document.getElementById('Chart').innerHTML=ami;
                var asuru=JSON.stringify(arima)
                document.getElementById('mainkan').value=asuru
                document.getElementById('spark').value=total
                document.getElementById('spandex').innerHTML=total
            }
        </script>
        <style>
            .dasw{
                min-height: 500px;
                /* max-height: 500px; */
            }
        </style>
        @endsection