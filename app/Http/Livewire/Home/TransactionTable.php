<?php

namespace App\Http\Livewire\Home;

use App\Models\License;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TransactionTable extends Component
{
    public $transactions;

    protected $listeners = ['refreshTransactionTable' => '$refresh'];
    public function cancelTransaction($transaction_id)
    {
        $licenses = License::where('transaction_id', $transaction_id)->get();
        // update license availability
        foreach ($licenses as $license) {
            $license->update(['transaction_id' => null, 'status' => 1]);
        }
        // delete transaction
        Transaction::find($transaction_id)->delete();
        session()->flash('success', 'Transaction has been canceled!');
        $this->emit('refreshTransactionTable');
    }
    public function mount()
    {
        $this->transactions = Transaction::where('user_id', Auth::user()->id)->get();
    }

    public function render()
    {
        return view('livewire.home.transaction-table');
    }
}
