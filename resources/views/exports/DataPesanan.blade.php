
<table>
	@foreach($data as $key => $item)
	    <thead>
	    <strong>
		   	<tr>
		        <th>Nama Petugas</th>
		        <th>{{ $item['users']->name }}</th>
		    </tr>
		    <tr>
		        <th>Total Harga</th>
		        <th>Pemesan</th>
		        <th>Pesanan</th>
		        <th>CRN</th>
		        <th>Waktu</th>
		    </tr>
	    </strong>
	    </thead>
	    <tbody>
	    @php
	    $pin=0;
	    @endphp
	    @foreach($item['item'] as $key2 => $item2)
			@php
			$pin+=$item2->total_harga;
			@endphp
	        <tr>
	            <td>{{ $item2->total_harga }}</td>
	            <td>{{ $item2->nama_pemesan }}</td>
	            <td>
	            <?php 
	            	$jps=json_decode($item2->pesanan);
	            ?>
				@foreach ($jps as $klas => $logt) 
					produk: {{ $logt->produk }} , quantity : {{ $logt->quantity }} <br>
				@endforeach
		        </td>
	            <td>{{ $item2->crn }}</td>
				<td>{{ $item2->created_at }}</td>
	        </tr>
	    @endforeach
		<tr>
            <td>Total Pemasukan</td>
            <td>{{ $pin }}</td>
            <td>Data Di buat pada {{ date('Y-m-d') }}</td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
	    </tbody>   
    @endforeach
</table>

