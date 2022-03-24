        <!-- tinusa -->
        <!-- Product section-->
        <!-- <section class="py-5"> -->
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{url('/cs1/'.$index->img_item)}}" id='imgitem{{$key}}'></div>
                    <div class="col-md-6">
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="{{'q'.$key}}" type="num" value="1" style="max-width: 3rem">
                            <input type="hidden" value="{{$index->nama_item}}" id="{{'produk'.$key}}">
                            <input type="hidden" value="{{$index->harga_item}}" id="{{'price'.$key}}">
                            <button class="btn btn-outline-dark flex-shrink-0" type="button" data-bs-dismiss="modal" onclick="ordermyitem({{$key}})">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </div>
                        <hr>
                        <br>
                        <div class="small mb-1">SKU: </div>
                        <h1 class="display-5 fw-bolder">{{$index->nama_item}}</h1>
                        <div class="fs-5 mb-5">
                            <!-- <span class="text-decoration-line-through">{{$index->nama_item}}</span> -->
                            <span>{{$index->harga_item}}</span>
                        </div>
                        <p class="lead">{!! $index->komposisi_item !!}.</p>
                    </div>
                </div>
            </div>
        <!-- </section> -->
        <!-- Related items section-->
