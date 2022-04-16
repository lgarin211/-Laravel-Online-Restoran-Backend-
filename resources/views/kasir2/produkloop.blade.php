        @foreach ($data['data'] as $key => $index)
            <li>
                <a href="#" class="item">
                    <img src="{{ url('/public/cs1/' . $index->img_item) }}" alt="image" class="image">
                    <div class="in">
                        <div>
                            <header>stock : {{ $index->stok_item }}</header>
                            {{ $index->nama_item }}
                            <footer>Rp {{ $index->harga_item }}</footer>
                        </div>
                        <span class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#{{ 'ubisofprybinby' . $key }}">order</span>
                    </div>
                </a>
            </li>

            <!-- Modal -->
            <div class="modal fade" id="{{ 'ubisofprybinby' . $key }}" tabindex="-1"
                aria-labelledby="{{ 'ubisofprybinby' . $key }}Label" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="{{ 'ubisofprybinby' . $key }}Label">
                                <div class="listview-title">Produk Contoh</div>
                            </h5>
                        </div>
                        <div class="modal-body">
                            <!-- start -->
                            <div class="container px-4 px-lg-5 my-5">
                                <div class="row gx-4 gx-lg-5 align-items-center">
                                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                                            src="{{ url('/public/cs1/' . $index->img_item) }}" id='imgitem{{$key}}'></div>
                                    <div class="col-md-6">
                                        <div class="d-flex">
                                            <div class="stepper stepper-sm stepper-secondary">
                                                <a href="#" class="stepper-button stepper-down">-</a>
                                                <input type="text" class="form-control" value="12" disabled
                                                    style="width: 100%" id="{{ 'much' . $key }}">
                                                <a href="#" class="stepper-button stepper-up">+</a>
                                            </div>

                                            <input type="hidden" value="{{$index->nama_item}}" id="{{'produk'.$key}}">
                                            <input type="hidden" value="{{$index->harga_item}}" id="{{'price'.$key}}">

                                            <button class="btn btn-outline-dark flex-shrink-0" type="button"
                                                data-bs-dismiss="modal" onclick=additem({{ $key }})>
                                                <i class="bi-cart-fill me-1"></i>
                                                Add to cart
                                            </button>
                                        </div>
                                        <hr>
                                        <br>
                                        <div class="small mb-1">SKU: </div>
                                        <h1 class="display-5 fw-bolder">Espresso</h1>
                                        <div class="fs-5 mb-5">
                                            <span>24998</span>
                                        </div>
                                        <p class="lead">
                                        <p>Espresso merupakan minuman kopi yang paling kuat kadar kopinya (very strong).
                                            Espresso merupakan ekstrak biji kopi murni tanpa campuran. Rasanya sudah
                                            pasti pahit, dengan tingkat kekentalannya tergantung dari biji kopi yang
                                            digunakan. Espresso biasa dikonsumsi dalam cangkir kecil.</p>.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary"
                                onclick=additem({{ $key }})>Pesan</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <script>
            var datapesanan = [];
            var totalhargapesanan = 0;
            additem = (id) => {
                var much = document.getElementById('much' + id).value;
                var produk = document.getElementById('produk' + id).value;
                var price = document.getElementById('price' + id).value;
                var data = {
                    'much': much,
                    'produk': produk,
                    'price': price,
                    'total_price': much * price
                }
                datapesanan.push(data);
                totalhargapesanan += data.total_price;
                savetostore();
            }

            savetostore = () => {
                sessionStorage.setItem('datapesanan', JSON.stringify(datapesanan));
                sessionStorage.setItem('totalhargapesanan', totalhargapesanan);
                console.log(sessionStorage.getItem('datapesanan'));
                console.log(sessionStorage.getItem('totalhargapesanan'));
            }

        </script>