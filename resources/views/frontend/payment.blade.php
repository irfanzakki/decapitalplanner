@include('frontend.layouts.header')
    <section class="py-5">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <div class="container">
            <div class="row">
                <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                    @if ($orders->status == 1)
                        <button class="btn btn-warning btn-lg btn-block">
                            <span style="font-size: 15px;">Our Admin will confirm your payment and send an email to you very soon</span>
                        </button>
                    @elseif($orders->status == 2)
                        <button class="btn btn-success btn-lg btn-block">
                            <span>Payment Has been Received</span>
                        </button>
                    @elseif($orders->status == 3)
                        <button type="button" class="btn btn-danger btn-lg btn-block" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$orders->remarks}}">
                            <span>Payment Has been Canceled</span>
                            <br>
                            <span>{{$orders->remarks}}</span>
                        </button>
                        @endif
                        <br>
                    <div class="row">
                        <div>
                            <div class="text-right"><b>Date </b>: {{date('d F Y')}}</div>
                            <div class="text-right"><b>Order ID # </b>: {{strtoupper($orders->order_id)}}</div>
                            <br>
                            <br>
                        </div>
                        
                        <div class="text-center">
                            <h1>Receipt</h1>
                        </div>
                        </span>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th class="text-center">Discount</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-md-6"><em>{{$orders->category_name}}</em></h4></td>
                                    <td class="col-md-2 text-center">{{$orders->discount}}%</td>
                                    <td class="col-md-2 text-center" style="font-size: 15px;">Rp. {{$orders->price}}</td>
                                    <td class="col-md-2 text-center" style="font-size: 15px;">Rp. {{$orders->fix_price}}</td>
                                </tr>
                                
                                <tr>
                                    <td>   </td>
                                    <td class="text-right"><h4><strong>Total: </strong></h4></td>
                                    <td colspan="2" class="text-right text-danger"><h4><strong>Rp. {{$orders->fix_price}}</strong></h4></td>
                                </tr>
                            </tbody>
                        </table>
                        @if ($orders->status == 0 || $orders->status == 3)
                        <div class="col-12">
                            <b>Remarks</b>
                            <p>Pembayaran dilakukan dalam waktu 1 x 24 jam setelah Order dibuat. Pembayaran dilakukan melalui <b>Bank Transfer</b> dibawah ini : </p>
                            <address>
                            <strong>Bank {{$bank->bank_name}}</strong>
                            <br>
                            {{$bank->rekening}}
                            <br>
                            A/n {{$bank->atas_nama}}
                            <br>
                            <abbr title="Cabang">Kantor Cabang </abbr> {{$bank->cabang}}
                        </address>
                        
                        <b>Upload struk / bukti pembayaran :</b>
                        </div>
                        
                            <form action="/uploadStruk" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="order_id" value="{{$orders->ordered_id}}">
                                <input type="hidden" name="pay_id" value="{{$orders->pay_id}}">
                                <input type="hidden" name="catalog_id" value="{{$orders->catalog_id}}">
                                <input type="hidden" name="category_id" value="{{$orders->id}}">
                                <input type="hidden" name="user_id" value="{{session('user_id')}}">
                                <input type="hidden" name="price" value="{{($orders->price) - ($orders->price * $orders->discount/100)}}">
                                <div class="form-group">
                                    <input type="file" name="filename">
                                </div>
            
                                <button type="submit" class="btn btn-success btn-lg btn-block">
                                    Upload Bukti Pembayaran   <span class="glyphicon glyphicon-chevron-right"></span>
                                </button>
                            </form>
                        
                        @endif
                        
                        
                    </div>
                </div>
            </div>
    </section>

@include('frontend.layouts.footer')