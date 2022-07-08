@include('layout.header')

<!-- Begin Page Content -->
<form action="/items/edit/{{$item->item_id}}" method="post">
    @csrf
    @method('PUT')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">   <a class="	fa fa-chevron-left" aria-hidden="true" href="/items"></a>
            &nbsp; &nbsp;Create New Item</h1>
        </div>


        <div class="row">
            <div class="col-lg-8">
            <div class="card mb-4">
                    <div class="card-header">Item Name</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="Item name" name="item_name" value="{{$item->item_name ?? '' }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Price</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput1" type="number" min="0" placeholder="Price" name="price" value="{{$item->price ?? '' }}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
            <div class="card mb-4">
                        <div class="card-header">Brand</div>
                        <div class="card-body">
                            <select class="form-control" name="brand_id">
                                @foreach ($brands as $brand)
                                <option value="{{$brand->brand_id}}"<?php if( $brand->brand_id == $item->brand_id){echo 'selected';}?>>{{$brand->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">Category</div>
                        <div class="card-body">
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $category)
                                <option value="{{$category->category_id}}"<?php if( $category->category_id == $item->category_id){echo 'selected';}?>>{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                <div class="card mb-4">
                    <div class="card-header">Actions</div>
                    <div class="card-body">
                        <div class="d-grid">
                            <button type="submit" name="create_item" value="create_item" class="fw-500 btn btn-primary col">Create Item</button>
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