<?php

namespace App\Http\Livewire\Dashboard\Transaction;

use App\Models\Transaction;
use Livewire\Component;

class Table extends Component
{
    public $transactions = [];
    public function mount()
    {
        $this->transactions = Transaction::orderBy('status', 'desc')->get();
    }
    public function render()
    {
        return view('livewire.dashboard.transaction.table');
    }
}
