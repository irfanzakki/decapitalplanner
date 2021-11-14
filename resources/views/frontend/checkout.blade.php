@include('frontend.layouts.header')
<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
        font-size: 3.5rem;
        }
    }
</style>  
<div class="container">
    <section class="py-5">
    <div class="py-5 text-center">
      <h2>Checkout form</h2>
      <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    </div>
    
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          {{-- <span class="badge bg-primary rounded-pill">3</span> --}}
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Product name</h6>
              <small class="text-muted">{{$order[0]->category_name}}</small>
              <img class="justify-content-middle imgdecapital" style="margin-top: 10px;" src="./../assets_frontend/img/{{$order[0]->filename}}" alt="">
            </div>
            <span class="text-muted text-nowrap">Rp. {{$order[0]->price}}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Discount</h6>
              {{-- <small>EXAMPLECODE</small> --}}
            </div>
            <span class="text-success">- Rp. {{($order[0]->price * $order[0]->discount/100)}}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span style="font-weight: 600">Total (Rupiah)</span>
            <strong>Rp. {{($order[0]->price) - ($order[0]->price * $order[0]->discount/100)}}</strong>
          </li>
        </ul>
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Billing address</h4>
        <form action="/storeOrder" method="POST" class="needs-validation" novalidate>
          {{ method_field('POST') }}
          {{ csrf_field() }}
          <input type="hidden" name="catalog_id" value="{{$order[0]->catalog_id}}">
          <input type="hidden" name="category_id" value="{{$order[0]->id}}">
          <input type="hidden" name="user_id" value="{{session('user_id')}}">
          <input type="hidden" name="fix_price" value="{{($order[0]->price) - ($order[0]->price * $order[0]->discount/100)}}">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" name="firstname" placeholder="" value="{{session('firstname')}}" required>
              <div class="invalid-feedback">
                  <small>
                    Valid first name is required.
                  </small>
                </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" name="lastname" placeholder="" value="{{session('lastname')}}" required>
              <div class="invalid-feedback">
                  <small>
                    Valid last name is required.
                  </small>
                </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="{{session('email')}}" required>
              <div class="invalid-feedback">
                  <small>
                    Please enter a valid email address.
                  </small>
                </div>
            </div>

            <div class="col-12">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="phone" class="form-control" id="phone" name="phone" placeholder="0812******" value="{{session('phone')}}" required>
                <div class="invalid-feedback">
                    <small>
                    Please enter a valid phone numbers.
                    </small>
                </div>
              </div>

            <div class="col-12">
              <label for="address" class="form-label">Destination Address</label>
              <textarea type="text" class="form-control" id="address" name="address" placeholder="Jl. XXX No. 00 " required></textarea>
              <div class="invalid-feedback">
                  <small>
                    Please enter your destination address.
                  </small>
                </div>
            </div>

            <div class="col-md-6">
              <label for="country" class="form-label">City</label>
              <select class="form-select" id="country" name="city" required>
                <option value="">Choose...</option>
                <option>Jakarta</option>
                <option>Bogor</option>
                <option>Depok</option>
                <option>Tangerang</option>
                <option>Bekasi</option>
              </select>
              <div class="invalid-feedback">
                  <small>
                    Please select a valid country.
                  </small>
                </div>
            </div>

            <div class="col-md-6">
              <label for="zip" class="form-label">Zip</label>
              <input type="number" class="form-control" name="zip_code" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                  <small>
                    Zip code required.
                  </small>
                </div>
            </div>
          </div>

          <button class="w-100 btn btn-primary btn-lg mt-5" type="submit">Continue to payment</button>
        </form>
      </div>
    </div>
    </section>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>


@include('frontend.layouts.footer')