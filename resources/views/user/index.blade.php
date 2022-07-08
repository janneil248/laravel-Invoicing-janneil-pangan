@include('layout.header')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
        <a href="/users/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Create New User</a>
    </div>
    <div class="card-header">{{session('mssg')}}</div>
    <div class="card mb-4">
        <div class="card-header">All Users</div>
        <div class="card-body p-0">
            <!-- Billing history table-->
            <div class="table-responsive table-billing-history">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th class="border-gray-200" scope="col">User</th>
                            <th class="border-gray-200" scope="col">Full Name</th>
                            <th class="border-gray-200" scope="col">Position</th>
                            <th class="border-gray-200" scope="col">Branch</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_users as $user)
                        <tr>
                            <td>{{$user->username}}</td>
                            <td>{{$user->firstname.' '.$user->lastname}}</td>
                            <td>{{$user->position_name}}</td>
                            <td>{{$user->branch}}</td>
                            <form action="/users/delete/{{$user->user_id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <td><a href="/users/edit/{{$user->user_id}}" type="button" class="btn btn-info btn-icon-split btn-sm">
                                        <span class="text">Update</span>
                                    </a>
                                    &emsp;
                                    <button type="submit" class="btn btn-danger btn-icon-split btn-sm">
                                        <span class="text">Delete</span>
                                    </button>
                                </td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item disabled">
            <a class="page-link">Previous</a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#">Next</a>
        </li>
    </ul>
</nav> -->

</div>
<!-- End of Main Content -->

@include('layout.footer')