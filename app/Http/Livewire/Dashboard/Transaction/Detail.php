<?php

namespace App\Http\Livewire\Dashboard\Transaction;

use App\Models\Transaction;
use Livewire\Component;

class Detail extends Component
{
    public $transaction_id, $transaction;

    public function rejectTransaction($transaction_id)
    {
        // update transaction status
        Transaction::find($transaction_id)->update(['status' => 3]);
        return redirect()->route('dashboard.transaction.index')->with('success', 'Transaction has been rejected!');
    }

    public function approveTransaction($transaction_id)
    {
        // update transaction status
        Transaction::find($transaction_id)->update(['status' => 2]);
        return redirect()->route('dashboard.transaction.index')->with('success', 'Transaction has been approved!');
    }

    public function mount()
    {
        $this->transaction = Transaction::find($this->transaction_id);
        if (!$this->transaction) abort(404);
        if ($this->transaction->status == 0) abort(403);
    }
    public function render()
    {
        return view('livewire.dashboard.transaction.detail');
    }
}
