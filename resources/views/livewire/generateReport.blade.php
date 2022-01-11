
<html>
	<head>
		<meta charset="utf-8">
		<title>Report</title>
		<link rel="stylesheet" type="text/css" href="{{ public_path().'/assets/css/invoice.css'}}">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
		<script src="{{public_path().'/assets/css/invoice.js'}}"></script>
	</head>
    
	<body>
		<header>
			<h1 style="background-color: gray">Report Order <br> <br> Periode {{date('d-m-Y',strtotime($start))}} s/d {{date('d-m-Y',strtotime($end))}}</h1><br>
		</header>
		<article>
			<address>
				<img style="width: 45%;float:left;" src="{{public_path('assets_frontend/img/logobrand2.png')}}" alt="">
			</address>
			<table class="meta">
				<tr>
					<th><span>Report #</span></th>
					<td><span>{{$inv_id}}</span></td>
				</tr>
				<tr>
					<th><span>Date</span></th>
					<td><span>{{date('F d, Y')}}</span></td>
				</tr>
				<tr>
					<th><span>Total Transaction</span></th>
					<td><span id="prefix"></span><span>{{count($orders)}}</span></td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th style="width:10px;"><span>No.</span></th>
						<th style="width:120px;"><span>Order ID</span></th>
						<th style="width:160px;"><span>Item</span></th>
						<th><span>Status</span></th>
						<th><span>Email</span></th>
						<th><span>Price</span></th>
					</tr>
				</thead>
				<tbody>
                    @php
                        $no = 1;
                        $jumlah = [];
                        $total = [];
                    @endphp
					@foreach ($orders as $order)
                    @php
                        // looping atribut jumlah dan harga
                        if ($order->status == 1) {
                            $jumlah[]    =$order->real_price - ($order->real_price * $order->discount)/100;
                        }
                        $total[]    =$order->real_price - ($order->real_price * $order->discount)/100;
                    
                    @endphp
                    
                       
                        <tr class="text-center">
                            <td style="text-align:center;">{{ $no }}</td>
                            <td style="text-align:center;">{{ $order->order_id }}</td>
                            <td style="text-align:center;">{{ $order->category_name }}</td>
                            <td style="text-align:center;">{{ $order->status == 1 ? 'Paid' : ($order->status == 2 ? 'Cancel' : 'Pending')}}</td>
                            <td style="text-align:center;">{{ $order->user_email }}</td>
                            <td style="text-align:right;">Rp.{{ $order->real_price - ($order->real_price * $order->discount)/100 }}</td>
                            
                           
                        </tr>
                        @php
                            $no++;
                        @endphp
                    @endforeach
				</tbody>
			</table>
			<table class="balance">
				
				<tr>
					<th><span>Balance Received</span></th>
					<td style="font-weight: 700;"><span data-prefix>Rp. </span><strong>{{array_sum($jumlah)}}</strong></td>
				</tr>
                <tr>
					<th><span>Total Value</span></th>
					<td style="font-weight: 700;"><span data-prefix>Rp. </span><strong>{{array_sum($total)}}</strong></td>
				</tr>
			</table>
		</article>
	</body>
</html>