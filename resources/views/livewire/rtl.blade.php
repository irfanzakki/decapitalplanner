<style>

    .row > .column {
    padding: 0 8px;
    }
    
    .row:after {
    content: "";
    display: table;
    clear: both;
    }
    
    .column {
    float: left;
    width: 25%;
    }
    
    /* The Modal (background) */
    .modal {
    display: none;
    position: fixed;
    z-index: 991;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.857);
    }
    
    /* Modal Content */
    .modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    width: 90%;
    max-width: 1200px;
    }
    
    /* The Close Button */
    .close {
    color: white;
    position: absolute;
    top: 10px;
    right: 25px;
    font-size: 35px;
    font-weight: bold;
    }
    
    .close:hover,
    .close:focus {
    color: #999;
    text-decoration: none;
    cursor: pointer;
    }
    
    .mySlides {
    display: none;
    }
    
    .cursor {
    cursor: pointer;
    }
    
    /* Next & previous buttons */
    .prev,
    .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -50px;
    color: white;
    font-weight: bold;
    font-size: 20px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
    -webkit-user-select: none;
    }
    
    /* Position the "next button" to the right */
    .next {
    right: 0;
    border-radius: 3px 0 0 3px;
    }
    
    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
    background-color: rgba(0, 0, 0, 0.8);
    }
    
    /* Number text (1/3 etc) */
    .numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
    }
    
    img {
    margin-bottom: -4px;
    }
    
    .caption-container {
    text-align: center;
    background-color: black;
    padding: 2px 16px;
    color: white;
    }
    .caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
    }
    
    .demo {
    opacity: 0.6;
    }
    
    .active,
    .demo:hover {
    opacity: 1;
    }
    
    img.hover-shadow {
    transition: 0.3s;
    }
    
    .hover-shadow:hover {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    </style>
    <div class="modal"  id="fileModal" tabindex="-1">
      <span class="close">&times;</span>  
      <div class="modal-dialog">
        <div class="modal-contents">
          <img class="modal-content" id="imgFile">
          <div class="caption"></div>
          
        </div>
      </div>
    </div>
    
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              @if (session()->has('message'))
                        <div wire:model="showSuccesNotification"
                            class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                            <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                            <span
                                class="alert-text text-white">{{ session('message') }}</span>
                            <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    @endif
              <div class="row">
                <div class="col-md-10">
                  <h6>Payment List Table</h6>
    
                </div>         
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr class="text-center">
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Order ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Item</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Client name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bank</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Create Date</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Update Date</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Filename</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Status</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Action</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    // $no = (($payments->currentPage() * 10) - 10)+1 ;
                        $no = 1 ;
                        $status = 4;
                    @endphp
                    @foreach ($payments as $payment)
                        
                        <tr class="text-center">
                            <th scope="row">{{ $no }}</td>
                            <td>{{ $payment->order_id }}</td>
                            <td>{{ $payment->cat_id }}</td>
                            <td>{{ $payment->user_id }}</td>
                            <td>{{ $payment->price }}</td>
                            <td>{{ $payment->bank_name }}</td>
                            <td>{{ $payment->created_at }}</td>
                            <td>{{ $payment->updated_at }}</td>
                            <td>
                            <a data-src="./../assets_frontend/img/{{$payment->filename}}" class="myImg">{{ $payment->filename }}</a>
                            </td>
                            <td>
                                @if ($payment->status == 0)
                                    <span class="badge bg-info text-dark">Waiting Approval</span>
                                
                                @elseif($payment->status == 1)
                                    <span class="badge bg-success text-dark">Approved</span>
                                @else
                                    <span class="badge bg-danger text-dark">Declined</span>
                                @endif
                                
                                {{-- <a href="{{ route('category-edit',$payment->id) }}" class="btn btn-warning btn-sm text-white"><i class="fa fa-edit fa-fw"></i> {{ $payment->status }}</a> --}}
                            </td>
                            <td>
                                
                                @if ($payment->status  == 0 || $payment->status  == 2)
                                    <a href="{{ route('category-edit',$payment->id) }}" class="btn btn-info btn-sm text-white"><i class="fa fa-edit fa-fw"></i> Approve</a>
                                    <a href="{{ route('category-edit',$payment->id) }}" class="btn btn-danger btn-sm text-white"><i class="fa fa-edit fa-fw"></i> Decline</a>

                                @endif
                            </td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                    @endforeach
                  </tbody>
                  
                </table>
                <div class="d-flex justify-content-center">{{ $payments->links() }}</div>
                
                
              </div>
              
            </div>
          </div>
        </div>
      </div>
    
      <script src="../assets_frontend/js/jquery-1.11.0.min.js"></script>
      <script>
        // Get the modal
        var modal = document.getElementById("fileModal");
        
        // Get the image and insert it inside the modal - use its "alt" text as a caption
        // var img = document.getElementById("myImg");
        var img = $(".myImg");
        $('.myImg').on('click',function(){
            var modalImg = document.getElementById("imgFile");
            var captionText = document.getElementById("caption");
            modalImg.src = $(this).data('src');
            $('.caption').text(this.alt);
            modal.style.display = "block";
        })
        
        img.onclick = function(){
          modal.style.display = "block";
          modalImg.src = this.data('src');
        //   alert('a')
        }
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
          modal.style.display = "none";
        }
        </script>