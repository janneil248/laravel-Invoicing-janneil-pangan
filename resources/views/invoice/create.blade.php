@include('layout.header')

<!-- Begin Page Content -->
<div class="container-fluid">
    <form action="/invoices" method="post">
        @csrf
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
              
            <h1 class="h3 mb-0 text-gray-800"><a class="fa fa-chevron-left" aria-hidden="true" href="/invoices"></a>
            &nbsp; &nbsp;Billing</h1>
            <button type="submit" class="btn btn-success btn-icon-split btn-sm" value="Create">
                <span class="text">Create Invoice</span>
            </button>
        </div>
        <div class="card mb-4">
            <div class="card-header">Invoice - {{$nextinvoiceid}}</div>
        </div>
        <div class="card mb-4">
            <div class="card-header">Sold By</div>
            <div class="card-body">
                <select class="form-control" name="sold_by">
                    @foreach ($users as $user)
                    <option value="{{$user->user_id}}">{{$user->username}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">Customer</div>
            <div class="card-body">
                <select class="form-control" name="customer_id">
                    @foreach ($customers as $customer)
                    <option value="{{$customer->customer_id}}">{{$customer->customer_username}}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="card-header">{{session('mssg')}}</div>

        <div class="card mb-4">
            <div class="table-responsive table-billing-history">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th class="border-gray-200" scope="col">Item Name</th>
                            <th class="border-gray-200" scope="col">Brand</th>
                            <th class="border-gray-200" scope="col">Price</th>
                            <th class="border-gray-200" scope="col">Quantity </th>
                            <th class="border-gray-200" scope="col">Total </th>
                            <th class="border-gray-200" scope="col"><a style ="float:right" href="/transactions/{{$nextinvoiceid}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Edit Items</a></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{$transaction->item_name}}</td>
                            <td>{{$transaction->brand_name}}</td>
                            <td>{{$transaction->price}}</td>
                            <td>{{$transaction->quantity}}</td>
                            <td>{{$transaction->quantity*$transaction->price}}</td>
                            <td></td>




                        </tr>
                        @endforeach
                    </tbody>
                   
                </table>
                <div style="float:right" class="card-header">Grand Total: {{$total}}
                <input type="hidden" name="grand_total" value="{{$total}}">
            </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">Payment</div>
            <div class="card-body">
                <select class="form-control" name="payment_status">
                    <option value="Issued">Issued</option>
                    <option value="Paid">Paid</option>
                    <option value="Partially Paid">Partially Paid</option>
                </select>
            </div>

        </div>
        <div class="card mb-4">
            <div class="card-header">Comment</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <input class="form-control" id="exampleFormControlInput1" type="text" name="comment" value="1 year warranty">
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