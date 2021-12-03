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
      <h2>Complaint form</h2>
    </div>
    
      <div class="row justify-content-center">
        <h4 class="mb-3">Billing address</h4>
        <form action="/storeComplain" method="POST" class="needs-validation" novalidate>
          {{ method_field('POST') }}
          {{ csrf_field() }}
          <div class="row g-3">
            <div class="col-12">
                <label for="order_id" class="form-label">Order ID</label>
                <input type="text" class="form-control" id="order_id" name="order_id" placeholder="Insert Order ID" value="" required>
                <div class="invalid-feedback">
                    <small>
                      Please enter a valid Order ID.
                    </small>
                </div>
            </div>
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
              <label for="description" class="form-label">Complain Description</label>
              <textarea type="text" class="form-control" id="description" name="description" placeholder="Please enter your description." required></textarea>
              <div class="invalid-feedback">
                  <small>
                    Please enter your description.
                  </small>
                </div>
            </div>
          </div>

          <button class="w-100 btn btn-primary btn-lg mt-5" type="submit">Submit Complain</button>
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