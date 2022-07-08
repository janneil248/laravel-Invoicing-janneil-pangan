@include('layout.header')

<!-- Begin Page Content -->
<form action="/countries/edit/{{$countries->country_id}}" method="post">
    @csrf
    @method('PUT')
    <div class="container-fluid">
        <!-- Page Heading -->

        <div class="d-sm-flex align-items-center mb-4">
            
            <h1 class="h3 mb-0 text-gray-800"><a class="	fa fa-chevron-left" aria-hidden="true" href="/countries"></a>
            &nbsp; &nbsp;Edit Country</h1>
        </div>


        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">Country Name</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="Country Name" name="country" value="{{$countries->country ?? '' }}" required>
                            </div>
                        </div>
                    </div>
                </div>     
                <div class="card mb-4">
                    <div class="card-header">Iso Code</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="Iso Code" name="iso_code" value="{{$countries->iso_code ?? '' }}" required>
                            </div>
                        </div>
                    </div>
                </div>     
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">Actions</div>
                    <div class="card-body">
                        <div class="d-grid">
                            <button type="submit" name="update_country" value="update_country" class="fw-500 btn btn-primary col">Update Country</button>
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