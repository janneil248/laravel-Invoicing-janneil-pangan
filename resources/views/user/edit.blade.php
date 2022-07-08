@include('layout.header')

<!-- Begin Page Content -->
<form action="/users/edit/{{$user->user_id}}" method="post">
    @csrf
    @method('PUT')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center mb-4">
            <a class="	fa fa-chevron-left" aria-hidden="true" href="users.php"></a>
            &nbsp; &nbsp;
            <h1 class="h3 mb-0 text-gray-800">Update User</h1>
        </div>


        <div class="row">
            <div class="col-lg-8">

                <div class="card mb-4">
                    <div class="card-header">First Name</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="First Name" name="firstname" value="{{$user->firstname ?? '' }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Last Name</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="Last Name" name="lastname" value="{{$user->lastname ?? '' }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">User Name</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="User Name" name="username" value="{{$user->username ?? '' }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Password</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput1" type="password" placeholder="Password" name="password" value="{{$user->password ?? '' }}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
            <div class="card mb-4">
                    <div class="card-header">Email</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="Email Address" name="email" value="{{$user->email?? '' }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Position</div>
                    <div class="card-body">
                        <select class="form-control" name="position_id">
                            @foreach ($positions as $position)
                            <option value="{{$position->position_id}}"<?php if( $user->position_id == $position->position_id){echo 'selected';}?>>{{$position->position_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Branch</div>
                    <div class="card-body">
                        <select class="form-control" name="branch_id">
                            @foreach ($branches as $branch)
                            <option value="{{$branch->branch_id}}"<?php if( $user->branch_id == $branch->branch_id){echo 'selected';}?>>{{$branch->branch}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Actions</div>
                    <div class="card-body">
                        <div class="d-grid">
                            <button type="submit" name="update_user" value="update_user" class="fw-500 btn btn-primary col">Update User</button>
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