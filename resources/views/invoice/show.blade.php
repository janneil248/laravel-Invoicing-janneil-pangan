@include('layout.header')

<!-- Begin Page Content -->
<div class="container-fluid">

        @csrf
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Billing</h1>
            <a href="/invoices"  class="btn btn-secondary btn-icon-split btn-sm">
                <span class="text">Show All Invoice</span>
            </a>
        </div>
        <div class="card mb-4">
            <div class="card-header">INV-{{$invoice->invoice_number}}</div>
        </div>
        <div class="card mb-4">
            <div class="card-header">Sold By</div>
            <div class="card-body">
                <label for="">{{$invoice->firstname." ".$invoice->lastname}}</label>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">Customer</div>
            <div class="card-body">
                <label for="">Username : {{$invoice->customer_username}}</label>
                <br/>
                <label for="">Full Name: {{$invoice->customer_firstname." ".$invoice->customer_lastname}}</label>
                <br/>
                <label for="">Address : {{$invoice->customer_address}}</label>
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
                            <th class="border-gray-200" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{$invoice->item_name}}</td>
                            <td>{{$invoice->brand_name}}</td>
                            <td>{{$invoice->price}}</td>
                            <td>{{$invoice->quantity}}</td>
                            <td>{{$invoice->quantity*$invoice->price}}</td>
                            <td></td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
                <div style="float:right" class="card-header">Grand Total: {{$invoice->grand_total}}
              
            </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">Payment</div>
            <div class="card-body">
            <label for="">{{$invoice->payment_status}}</label>
            </div>

        </div>
        <div class="card mb-4">
            <div class="card-header">Comment</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="">{{$invoice->comment}}</label>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

@include('layout.footer')