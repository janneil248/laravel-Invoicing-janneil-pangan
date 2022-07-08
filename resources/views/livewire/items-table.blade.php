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
                            @if ($cart->where('id', $item->item_id)->count())
                            <td></td>
                            <td>In Cart</td>
                            @else
                            <form wire:submit.prevent="addToCart({{$item->item_id}})" action="/transactions" method="post">
                                @csrf
                                <td>
                                    <input wire:model="quantity.{{$item->item_id}}" style="width:70px" type="number">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary btn-icon-split btn-sm">
                                        <span class="text">Add to Cart</span>
                                    </button>
                                </td>
                            </form>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
