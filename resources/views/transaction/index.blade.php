@include('layout.header')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">   <a class="	fa fa-chevron-left" aria-hidden="true" href="/invoices/create"></a>
            &nbsp; &nbsp;Items</h1>
        <a href="/invoices/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"></i>Back to Invoice</a>
    </div>
    <div class="card-header">{{session('mssg')}}</div>
    <div class="card mb-4">
        <div class="card-header">
            <p style="float:left">All Items</p>
            <p style="float:right"><i class="fas fa-fw fa-shopping-cart"></i> &nbsp; My Items: {{$transactions->count()}}</p>
        </div>
        <div class="card-body p-0">
            <!-- Billing history table-->
            <div class="table-responsive table-billing-history">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th class="border-gray-200" scope="col">Item ID</th>
                            <th class="border-gray-200" scope="col">Item Name</th>
                            <th class="border-gray-200" scope="col">Brand</th>
                            <th class="border-gray-200" scope="col">Category</th>
                            <th class="border-gray-200" scope="col">Price</th>
                            <th class="border-gray-200" scope="col">Quantity</th>
                            <th class="border-gray-200" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>Item - {{$item->item_id}}</td>
                            <td>{{$item->item_name}}</td>
                            <td>{{$item->brand_name}}</td>
                            <td>{{$item->category_name}}</td>
                            <td>{{$item->price}}</td>
                         @if ($transactions->where('item_id',$item->item_id)->count())
                         <td>In Cart</td>
                         <form action="/transactions/delete/{{$account_number}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="item_del" value="{{$item->item_id}}">
                                <td> <button type="submit" class="btn btn-danger btn-icon-split btn-sm">
                                        <span class="text">Delete to Bill</span>
                                    </button>
                                </td>
                            </form>
                         @else
                            <form action="/transactions" method="post">
                                @csrf
                                <td>
                                    <input type="hidden" name="account_number" value="{{$account_number}}">
                                    <input type="hidden" name="item_id" value="{{$item->item_id}}">
                                    <input type="hidden" name="price" value="{{$item->price}}">
                                    <input style="width:70px" type="number" min="1" name="quantity" value="1" required>
                                </td>
                                <td> <button type="submit" class="btn btn-primary btn-icon-split btn-sm">
                                        <span class="text">Add to Bill</span>
                                    </button>
                                </td>
                            </form>
                            @endif
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