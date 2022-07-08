@include('layout.header')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Invoices</h1>
        <a href="/invoices/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Create New Invoice</a>
    </div>
    <div class="card-header">{{session('mssg')}}</div>
    <div class="card mb-4">
        <div class="card-header">All Invoices</div>
        <div class="card-body p-0">
      
            <!-- Billing history table-->
            <div class="table-responsive table-billing-history">
                <table class="table mb-0">
                    <thead>
                        <tr>   
                            <th class="border-gray-200" scope="col">Invoice Number</th>
                            <th class="border-gray-200" scope="col">Sold By</th>
                            <th class="border-gray-200" scope="col">Customer</th>
                            <th class="border-gray-200" scope="col">Status</th>
                            <th class="border-gray-200" scope="col">Comment</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $invoice)
                        <tr>
                            <td><a href="/invoices/{{$invoice->invoice_number}}">INV-{{$invoice->invoice_number}}</a></td>
                            <td>{{$invoice->firstname." ".$invoice->lastname}}</td>
                            <td>{{$invoice->customer_firstname." ".$invoice->customer_lastname}}</td>
                            <td>{{$invoice->grand_total}}</td>
                            <td>{{$invoice->payment_status}}</td>
                            <td>{{$invoice->comment}}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


@include('layout.footer')