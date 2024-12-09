

<div class="card me-2 col-md-3 col-xl-3">
    {{-- <h5 class="card-header">Featured</h5> --}}
    <div class="card-body ">
        {{-- <h5 class="card-title">Certificte Number </h5> --}}
        <form class="d-block" action='{{URL::to('/search')}}'  method="POST" role='search'>
            {{ csrf_field() }}
            <input class="form-control me-2" type="search" name="search" placeholder="Search Certificte number here ..." aria-label="Search"><br />
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
</div>


