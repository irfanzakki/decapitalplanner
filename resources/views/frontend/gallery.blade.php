@include('frontend.layouts.header')
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
  z-index: 1;
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
{{-- <div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
  </div> --}}



    <!-- Start Banner Hero -->
    <section class="container py-5">
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
                            <img src="{{asset('storage/assets_frontend/gallery/'.$item->filename)}}" class="myImg img-thumbnail" alt="{{$item->description}}">
                            
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    </section>
    
<!-- End Footer -->
@include('frontend.layouts.footer')

    
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
    </script>
