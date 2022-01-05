@include('frontend.layouts.header')

    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">
            <form action="index" method="GET">
                <div class="row">
                    <div class="col-md-5">
                        <input type="hidden" name="category_id" value="{{isset($catalog[0]) ? $catalog[0]->catalog_id : ''}}">
                        <select name="type" class="form-control" id="input">
                            <option value="0">Select Price</option>
                            <option value="1">Table Decoration</option>
                            <option value="2">Room Decoration</option>
                            
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-danger btn-sm filterSearch" value="Filter">
                    </div>
                    
                </div>
            </form>

            <div class="col-lg-12">
                @if ($catalog->count() == 0)
                    <div class="row">   
                        <div class="text-center">
                            There's no data found in this category
                        </div>
                    </div>
                @else
                    <div class="row">   
                        @foreach ($catalog as $key => $item)
                            <div class="col-md-3">
                                <div class="card mb-4 product-wap rounded-0">
                                    <div class="card rounded-0">
                                        <img style="min-height: 403px;" class="card-img rounded-0" src="../assets_frontend/img/{{ $item->filename }}">
                                        <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                            <ul class="list-unstyled">
                                                <li><a class="btn btn-success text-white mt-2" href="{{ route('events-detail',$item->id) }}"><i class="far fa-eye"></i></a></li>
                                                <li><a class="btn btn-success text-white mt-2" href="{{ route('checkout',$item->id) }}"><i class="fas fa-cart-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <a href="shop-single.html" class="h3 text-decoration-none"><b>{{ $item->category_name }}</b></a>
                                        <hr>
                                        <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                            <li class="badge bg-secondary" style="font-size: 10px!important;">Category ID : {{ $item->category_code }}</li>
                                        </ul>
                                        <p class="mb-0"> {{$item->type}}</p>
                                        <p class="mb-0">Rp. {{ $item->price }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                        
                    </div>
                    <div div="row">
                        <ul class="pagination pagination-lg justify-content-end">
                            <li class="page-item disabled">
                                <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">3</a>
                            </li>
                        </ul>
                    </div>
                @endif
                
            </div>

        </div>
    </div>
    <!-- End Content -->

    <!-- Start Brands -->
    <section class="bg-light py-5">
        <div class="container my-4">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Our Brands</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        Lorem ipsum dolor sit amet.
                    </p>
                </div>
                <div class="col-lg-9 m-auto tempaltemo-carousel">
                    <div class="row d-flex flex-row">
                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-light fas fa-chevron-left"></i>
                            </a>
                        </div>
                        <!--End Controls-->

                        <!--Carousel Wrapper-->
                        <div class="col">
                            <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="multi-item-example" data-bs-ride="carousel">
                                <!--Slides-->
                                <div class="carousel-inner product-links-wap" role="listbox">

                                    <!--First slide-->
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="../assets_frontend/img/brand_01.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="../assets_frontend/img/brand_02.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="../assets_frontend/img/brand_03.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="../assets_frontend/img/brand_04.png" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End First slide-->

                                    <!--Second slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="../assets_frontend/img/brand_01.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="../assets_frontend/img/brand_02.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="../assets_frontend/img/brand_03.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="../assets_frontend/img/brand_04.png" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Second slide-->

                                    <!--Third slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="../assets_frontend/img/brand_01.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="../assets_frontend/img/brand_02.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="../assets_frontend/img/brand_03.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="../assets_frontend/img/brand_04.png" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Third slide-->

                                </div>
                                <!--End Slides-->
                            </div>
                        </div>
                        <!--End Carousel Wrapper-->

                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-light fas fa-chevron-right"></i>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Brands-->
    
@include('frontend.layouts.footer')
<script>
    $(document).ready(function(){
        var a = $('select[name="type"]')
        if(a.val() == 0){
            $('.filterSearch').prop('disabled',true)
        }

    })
    var a = $('select[name="type"]')
    $(a).on('change',function(){
            if(a.val() != 0){
                $('.filterSearch').prop('disabled',false)
            }else{
                $('.filterSearch').prop('disabled',true)
            }
        })
</script>