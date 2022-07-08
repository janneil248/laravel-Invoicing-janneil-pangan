<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Item;

class ItemsTable extends Component
{
    public $items;
    public array $quantity = [];

    public function mount(){
        $this->items = Item::all();
        foreach ($this->items as $item) {
            $this->quantity[$item->item_id] = 1;
        }
    }

    public function render()
    {
        return view('livewire.items-table', [
            'items' => Item::itemxbrandxcategory(),
            'cart' => Cart::content()
        ]);
    }

    public function addToCart($item_id){
       
        $item = Item::findOrFail($item_id);
        Cart::add($item->item_id, $item->item_name, $this->quantity[$item_id], $item->price);

        return redirect('transactions')->with('mssg','Successfully added');
    }
}
