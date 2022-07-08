@include('layout.header')

<!-- Begin Page Content -->
<form action="/branches/edit/{{$branches->branch_id}}" method="post">
    @csrf
    @method('PUT')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center mb-4">
            
            <h1 class="h3 mb-0 text-gray-800"><a class="	fa fa-chevron-left" aria-hidden="true" href="/branches"></a>
            &nbsp; &nbsp;Edit Branch</h1>
        </div>


        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">Branch Name</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="Branch Name" name="branch" value="{{$branches->branch ?? '' }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Country</div>
                    <div class="card-body">
                        <select class="form-control" name="country_id">
                            @foreach ($countries as $country)
                            <option value="{{$country->country_id}}"<?php if( $branches->country_id == $country->country_id){echo 'selected';}?>>{{$country->country}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">Actions</div>
                    <div class="card-body">
                        <div class="d-grid">
                            <button type="submit" name="update_branch" value="update_branch" class="fw-500 btn btn-primary col">Update Branch</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

@include('layout.footer')