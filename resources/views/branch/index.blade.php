@include('layout.header')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Branches</h1>
        <a href="/branches/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Create New Branch</a>
    </div>
    <div class="card-header">{{session('mssg')}}</div>
    <div class="card mb-4">
        <div class="card-header">All Branches</div>
        <div class="card-body p-0">
            <!-- Billing history table-->
            <div class="table-responsive table-billing-history">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th class="border-gray-200" scope="col">Branch</th>
                            <th class="border-gray-200" scope="col">Country</th>
                            <th class="border-gray-200" scope="col">Iso Code</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($branches as $branch)
                        <tr>
                            <td>{{$branch->branch}}</td>
                            <td>{{$branch->country}}</td>
                            <td>{{$branch->iso_code}}</td>
                            <form action="/branches/delete/{{$branch->branch_id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <td><a href="/branches/edit/{{$branch->branch_id}}" type="button" class="btn btn-info btn-icon-split btn-sm">
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