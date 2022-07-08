@include('layout.header')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Countries</h1>
        <a href="/countries/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Create New Country</a>
    </div>

    <div class="card mb-4">
        <div class="card-header">All Countries</div>
        <div class="card-body p-0">
            <!-- Billing history table-->
            <div class="table-responsive table-billing-history">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th class="border-gray-200" scope="col">Country</th>
                            <th class="border-gray-200" scope="col">Iso Code</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(is_array($countries))
                            @foreach ($countries as $country)
                        <tr>
                            <td>{{$country->country}}</td>
                            <td>{{$country->iso_code}}</td>
                            <form action="/countries/delete/{{$country->country_id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <td><a href="/countries/edit/{{$country->country_id}}" type="button" class="btn btn-info btn-icon-split btn-sm">
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
                        @elseif(isset($countries))
                        <tr>
                            <td>{{$countries->country}}</td>
                            <td>{{$countries->iso_code}}</td>
                            <form action="/countries/delete/{{$countries->country_id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <td><a href="/countries/edit/{{$countries->country_id}}" type="button" class="btn btn-info btn-icon-split btn-sm">
                                        <span class="text">Update</span>
                                    </a>
                                    &emsp;
                                    <button type="submit" class="btn btn-danger btn-icon-split btn-sm">
                                        <span class="text">Delete</span>
                                    </button>
                                </td>
                            </form>
                        </tr>
                        @else
                        <td>No record</td>
                        @endif
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