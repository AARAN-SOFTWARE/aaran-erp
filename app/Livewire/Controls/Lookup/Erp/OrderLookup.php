<?php

namespace App\Livewire\Controls\Lookup\Erp;

use App\Livewire\Trait\ItemLookupAbstract;
use App\Models\Erp\Order;
use Livewire\Attributes\On;

class OrderLookup extends ItemLookupAbstract
{
    #[On('refresh-order-item')]
    public function refreshObj($v): void
    {
        $this->id = $v['id'];
        $this->searches = $v['name'];
        $this->getList();
    }

    public function mount($id,$name)
    {
        $this->id = $id;
        $this->searches = $name;
        $this->getList();
    }

    public function dispatchObj(): void
    {
        $this->dispatch('refresh-order',['id'=>$this->id,'name'=>$this->searches]);
    }

    public function getList(): void
    {
        $this->list = $this->searches ? Order::search(trim($this->searches))
            ->get() : Order::all();
    }

    public function render()
    {
        $this->getList();
        return view('livewire.controls.lookup.erp.order-lookup');
    }
}
