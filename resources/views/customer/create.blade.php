@include('layout.header')

<!-- Begin Page Content -->
<form action="/customers" method="post">
    @csrf
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center mb-4">
            <a class="	fa fa-chevron-left" aria-hidden="true" href="/customers"></a>
            &nbsp; &nbsp;
            <h1 class="h3 mb-0 text-gray-800">Create New Customer</h1>
        </div>
        <div class="card-header">{{session('mssg')}}</div>

        <div class="row">
            <div class="col-lg-8">
            <div class="card mb-4">
                    <div class="card-header">User Name</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="User Name" name="customer_username" value="" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">First Name</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="First Name" name="customer_firstname" value="" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Last Name</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="Last Name" name="customer_lastname" value="" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Address</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="Address" name="customer_address" value="" required>
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
                            <button type="submit" name="create_customer" value="create_customer" class="fw-500 btn btn-primary col">Create Customer</button>
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