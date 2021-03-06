<?php

namespace App\Http\Controllers\Admin;

use App\Models\Balance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MoneyValidationFormRequest;

class BalanceController extends Controller {
    public function index() {
        // método Dump and Die utilizado para depuração
        // dd(auth()->user()->id);

        $balance = auth()->user()->balance;
        $amount = $balance ? $balance->amount : 0;
        return view('admin.balance.index', compact('amount'));
    }

    public function deposit() {
        return view('admin.balance.deposit');
    }

    public function depositStore(MoneyValidationFormRequest $request, Balance $balance) {
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->deposit($request->value);

        if ($response['success']) {
            return redirect()->route('admin.balance')->with('success', $response['message']);
        } else {
            return redirect()->back()-with('error', $response['message']);
        }
    }
}
