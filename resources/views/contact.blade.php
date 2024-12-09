@extends("layouts.layout")

@section("content")
{{-- <h3>Contact us</h3> --}}

<div class="container">
    <div class="row justify-content-center mb-3">
        @include('search-form')

        <div class="card col-md-9 col-xl-9">
            <h5 class="card-header">Contact us</h5>

            <form style="padding: 16px;"action='{{URL::to('/contact')}}'  method="POST" role='contantus' onsubmit="return validateForm()" >
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Name </label>
                      <input type="text"  name="Name"  class="form-control" id="inputPassword4" placeholder="Name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPhone">Phone No.</label>
                        <input type="text"  name="Phone" class="form-control" id="inputEmail" placeholder="Phone" pattern="[0-9]+">
                </div>
            </div>
            <div class="form-group">
                <label for="inputName">company Name </label>
                <input type="text"  name="Cname" class="form-control" id="inputName" placeholder="Enter your company name.">
            </div>
            <div class="form-group">
                <label for="inputEmail">Email </label>
                <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" required>
                </div>
                <!-- Message input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form6Example7">Additional information</label>
                    <textarea class="form-control" name="information" id="form6Example7" rows="4" required></textarea>
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
</div>
@endsection()



<script>
    function validateForm() {
        // Basic validation using JavaScript
        const name = document.getElementById('inputPassword4').value;
        const phone = document.getElementById('inputEmail').value;
        const email = document.getElementById('inputEmail4').value;

        if (name === '' || phone === '' || email === '' ) {
            alert('Please fill in all required fields.');
            return false;
        }

        // More advanced validation can be added here, e.g., email format, phone number format
        return true;
    }
</script>
