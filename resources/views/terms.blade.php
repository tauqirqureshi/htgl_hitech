@extends("layouts.layout")

@section("content")
<div class="container">
    <div class="row justify-content-center mb-3">
        @include('search-form')
        {{-- <div class="card me-2 col-md-3 col-xl-3">
            <div class="card-body ">
                <form class="d-block" action='{{URL::to('/search')}}'  method="POST" role='search'>
                    {{ csrf_field() }}
                    <input class="form-control me-2" type="search" name="search" placeholder="Search Certificte number here ..." aria-label="Search"><br />
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div> --}}
        <div class="card col-md-9 col-xl-9">
            <h5 class="card-header">Terms and Conditions</h5>

        </div>
    </div>
</div>

@endsection()

