@extends('kasir2.master')
@section('content')
    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2" id="chartpin"></div>

        {{-- <div class="section">
            <a href="#" class="btn btn-sm btn-text-secondary btn-block" data-toggle="modal"
                data-target="#actionSheetDiscount">
                <ion-icon name="qr-code-outline"></ion-icon>
                Have a discount code?
            </a>
        </div> --}}

        {{-- <!-- Discount Action Sheet -->
        <div class="modal fade action-sheet" id="actionSheetDiscount" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Enter Discount Code</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form>
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="discount1">Discount Code</label>
                                        <input type="text" class="form-control" id="discount1"
                                            placeholder="Enter your discount code">
                                        <i class="clear-input">
                                            <ion-icon name="close-circle"></ion-icon>
                                        </i>
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Apply
                                        Discount</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Discount Action Sheet --> --}}

        <div class="section mt-2 mb-2">
            <div class="card">
                <ul class="listview flush transparent simple-listview">
                    <li>Price <span class="text-muted" id="linbin_total">RP. </span></li>
                    {{-- <li>Shipping <span class="text-muted">RP. </span></li> --}}
                    <li>Tax (10%)<span class="text-muted" id="linbin_tax">RP. </span></li>
                    <li>Total<span class="text-primary font-weight-bold" id="all_bin">RP. </span></li>
                </ul>
            </div>
        </div>

        <div class="section mb-2">
            <form action="{{url('/tes1')}}" method="POST">
                @csrf
                <input type="hidden" name="data" id="datapesanan">
                <input type="hidden" name="total" id="totalpesanan">
                <input type="hidden" name="crn" value="Makan Di Tempat">
                <input type="hidden" name="nama_pemesan" value="non">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Order Now</button>
            </form>
        </div>
    </div>
    <!-- * App Capsule -->

    

    <script>
        var datapesanan=[];
        var total=0;

        formdataset=()=>{
            document.getElementById('datapesanan').value= JSON.stringify(datapesanan);
            document.getElementById('totalpesanan').value=total;
        }

        load_chart=()=>{
                var inbin='';
                var data=JSON.parse(sessionStorage.getItem('datapesanan'));
                for (var i=0;i<data.length;i++){
                    var item=data[i];
                    total+=item.total_price;
                    inbin+=`
                    <div class="card cart-item mb-2">
                        <div class="card-body">
                            <div class="in">
                                <img src="${item.img}" alt="product" class="imaged">
                                <div class="text">
                                    <h3 class="title">${item.produk}</h3>
                                    <p class="detail">Produk sebanyak : ${item.quantity}</p>
                                    <strong class="price">${item.total_price}</strong>
                                </div>
                            </div>
                            <div class="cart-item-footer">
                                <div class="stepper stepper-sm stepper-secondary">
                                    <a href="#" class="stepper-button stepper-down" onclick=touchmuch('m',${i})>-</a>
                                    <input type="text" class="form-control" value="${item.quantity}" disabled />
                                    <a href="#" class="stepper-button stepper-up" onclick=touchmuch('p',${i})>+</a>
                                </div>
                                <a href="#" class="btn btn-outline-secondary btn-sm" onclick=removeitem('${i}')>Delete</a>
                            </div>
                        </div>
                    </div>
                    `;
                }
                document.getElementById('chartpin').innerHTML=inbin;
                datapesanan=data;
                
                var tax=total*10/100;
                var all=total+tax;

                document.getElementById('linbin_total').innerHTML=`RP. ${total}`;
                document.getElementById('linbin_tax').innerHTML=`RP. ${tax}`;
                document.getElementById('all_bin').innerHTML=`RP. ${all}`;

                formdataset();
        }

        function removeitem(i){
                    datapesanan.splice(i,1);
                    sessionStorage.setItem('datapesanan',JSON.stringify(datapesanan));
                    load_chart();
        }
        
        function touchmuch(type,i){
            var data=JSON.parse(sessionStorage.getItem('datapesanan'));
            if(type=='m'){
                if(data[i].quantity>1){
                    data[i].quantity--;
                    data[i].total_price=data[i].quantity*data[i].price;
                }
            }else{
                data[i].quantity++;
                data[i].total_price=data[i].quantity*data[i].price;
            }
            sessionStorage.setItem('datapesanan',JSON.stringify(data));
            load_chart();
        }
        load_chart();
    </script>
@endsection