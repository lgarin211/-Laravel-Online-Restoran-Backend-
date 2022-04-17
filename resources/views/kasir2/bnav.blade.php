    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="{{ url('/') }}" class="item">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
            </div>
        </a>
        <a href="{{ url('/chart') }}" class="item">
            <div class="col">
                <ion-icon name="basket-outline"></ion-icon>
                <span class="badge badge-danger" id="chartpinomiguslow">0</span>
            </div>
        </a>
        <a href="" class="item">
            <div class="col">
                <ion-icon name="albums-outline"></ion-icon>
                <span class="badge badge-danger">5</span>
            </div>
        </a>
        <a href="{{ url('/liststruck') }}" class="item">
            <div class="col">
                <ion-icon name="pricetags-outline"></ion-icon>
            </div>
        </a>
        <a href="javascript:;" class="item" data-toggle="modal" data-target="#sidebarPanel">
            <div class="col">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
        </a>
    </div>

    <script>
        function ibuni() {
            console.log('ajisan bakayaro');
            var abina = JSON.parse(sessionStorage.getItem('datapesanan'));
            console.log(abina)
            var ibumna = abina.length;
            console.log(ibumna);
            document.getElementById('chartpinomiguslow').innerHTML = ibumna;
            console.log('ajisan bakayaro2');
        }

        setInterval(() => {
            ibuni()
        }, 1000);
    </script>
    <!-- * App Bottom Menu -->
