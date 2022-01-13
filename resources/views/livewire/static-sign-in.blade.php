<div>
    <style>
        #logodecapital {
            width: 30%;
        }

        .imgdecapital {
            width: 100%;
        }
        @media only screen and (max-width: 768px) {
            #logodecapital {
                width: 50%;
            }
            .imgdecapital {
                width: 100%;
            }
        }
        * {
    box-sizing: border-box;
    }

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
    z-index: 999;
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
        color: rgb(160, 160, 160);
        position: absolute;
        top: 0px;
        right: 0px;
        font-size: 26px;
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

    .myImg{
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

    .deleteImg{
        border: 1px solid red;
        padding: 0px 5px;
        border-radius: 5px;
        background-color: red;
        color: white;
        position: relative;
        top: 30px;
        left: 5px;
        cursor: pointer;
    }
    </style>

    <div class="modal"  id="myModal" tabindex="-1">
        <span class="close">&times;</span>  
        <div class="modal-dialog">
          <div class="modal-contents">
            <img class="modal-content" id="img01">
            <div class="caption"></div>
            
          </div>
        </div>
    </div>
    <!-- The Modal -->
    <div class="modal" id="uploadModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Photo</h5>
              <button type="button" class="btn close" data-bs-dismiss="modal" aria-label="Close"><span class="btnclose">&times;</span></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save" action="#" method="POST">
                    <div class="form-group">
                        <label for="description">{{ 'Description' }}</label>
                        <div class="@error('description')border border-danger rounded-3 @enderror">
                            <textarea wire:model="description" class="form-control" id="description" rows="3"
                                placeholder="Say something about this photos"></textarea>
                        </div>
                        @error('description') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                   
                    <div class="form-group">
                        <label for="filenames" class="form-control-label">{{ __('Upload File') }}</label>
                        <div class="@error('filenames') border border-danger rounded-3 @enderror">
                            <input wire:model="filenames" class="form-control" type="file" name="filenames"
                                placeholder="Location" id="filenames">
                        </div>
                        
                        @error('filenames') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                   
                    <div class="">
                        <button style="float:right;position: relative;" type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                    </div>
                  </form>
            </div>
            {{-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary">Upload File</button>
            </div> --}}
          </div>
        </div>
      </div>



    <!-- Start Banner Hero -->
    <section class="container py-5">
        <div>
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
        </div>
        
    <div>
        <button class="btn btn-info addPhoto"><i class="fa fa-plus"></i> Add Photo</button>
    </div>
    <div class="gallery_content">
        <div class="col-md-12">
            <div class="row">
                @if ($gallery->count() == 0)
                    <div class="col-md-12">   
                        <div class="text-center">
                            There's no data found in this gallery
                        </div>
                    </div>
                @else 
                    @foreach ($gallery as $key => $item)
                        <div class="col-md-2 pb-3">
                            <div>
                                
                            <a href="deleteimage/{{$item->id}}" class="deleteImg">&times;</a>
                            <img src="{{asset('storage/assets_frontend/gallery/'.$item->filename)}}" class="myImg img-thumbnail" alt="{{$item->description}}">
                            </div>
                            
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    </section>
</div>
    <script src="../assets_frontend/js/jquery-1.11.0.min.js"></script>
<script>
    // Get the modal
    var modal = document.getElementById("myModal");
    
    // Get the image and insert it inside the modal - use its "alt" text as a caption
    // var img = document.getElementById("myImg");
    var img = $(".myImg");
    $('.myImg').on('click',function(){
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        modalImg.src = this.src;
        $('.caption').text(this.alt);
        modal.style.display = "block";
    })
    
    img.onclick = function(){
      modal.style.display = "block";
      modalImg.src = this.src;
    //   alert('a')
    }
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
      modal.style.display = "none";
    }


    $('.addPhoto').on('click',function(){
        
        $('#uploadModal').show();
    })

    $('.close').on('click',function(){
        
        $('#uploadModal').hide();
    })

    
    </script>
