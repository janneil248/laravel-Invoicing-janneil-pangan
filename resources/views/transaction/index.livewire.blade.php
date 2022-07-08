
@include('layout.header')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Items</h1>
        <a href="/items/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Create New Item</a>
    </div>
    <div class="card-header">{{session('mssg')}}</div>
    <div class="card mb-4">
       @livewire('cart-counter')

        <div class="card-body p-0">
            <!-- Billing history table-->
            <div class="table-responsive table-billing-history">
               @livewire('items-table')
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<nav aria-label="Page navigation example">
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
</nav>

</div>
<!-- End of Main Content -->
@include('layout.footer')