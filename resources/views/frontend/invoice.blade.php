
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" type="text/css" href="{{ public_path().'/assets/css/invoice.css'}}">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
		<script src="{{public_path().'/assets/css/invoice.js'}}"></script>
	</head>
    
	<body>
		<header>
			<h1>Invoice</h1>
			<address>
				<p>{{ucfirst($orders->user_name)}}</p>
				<p style="word-break: break-word;">{{ucfirst($orders->address)}}</p>
				<p>{{$orders->phone}}</p>
			</address>
		</header>
		<article>
			<address>
				<img style="width: 45%;float:left;" src="{{public_path('assets_frontend/img/logobrand2.png')}}" alt="">
			</address>
			<table class="meta">
				<tr>
					<th><span>Invoice #</span></th>
					<td><span>{{$inv_id}}</span></td>
				</tr>
				<tr>
					<th><span>Date</span></th>
					<td><span>{{date('F d, Y')}}</span></td>
				</tr>
				<tr>
					<th><span>Amount Due</span></th>
					<td><span id="prefix">Rp.</span><span>{{$orders->price}}</span></td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span>Item</span></th>
						<th><span>Description</span></th>
						<th><span>Rate</span></th>
						<th><span>Quantity</span></th>
						<th><span>Price</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><span>{{$orders->catalog_name}}</span></td>
						<td><span>{{$orders->category_name}}</span></td>
						<td><span data-prefix>Rp. </span><span>{{$orders->real_price}}</span></td>
						<td><span>1</span></td>
						<td><span data-prefix>Rp. </span><span>{{$orders->real_price}}</span></td>
					</tr>
				</tbody>
			</table>
			<table class="balance">
				<tr>
					<th><span>Discount</span></th>
					<td><span data-prefix>Rp. </span><span>{{($orders->discount * $orders->real_price)/100}}</span></td>
				</tr>
				<tr>
					<th><span>Balance Due</span></th>
					<td style="font-weight: 700;"><span data-prefix>Rp. </span><strong>{{$orders->price}}</strong></td>
				</tr>
			</table>
		</article>
	</body>
</html>