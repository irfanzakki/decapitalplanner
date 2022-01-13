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




    <!-- Start Banner Hero -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-md-8 text-black">
                    <h1>About Us</h1>
                    <p>
                      <b>Decapital Planner</b>   gives key event arranging and innovative conveyance of gatherings and events for an assortment of businesses, 
                      including, <b> Birthday Party</b>, <b>Bridal Shower</b>, <b>Baby Shower</b>.
                      We are grant giving complete gathering and event coordinations and inventive generation the executives.
                      We offer key direction and program the board.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Banner -->

    
@include('frontend.layouts.footer')