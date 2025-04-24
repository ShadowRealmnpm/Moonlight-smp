
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BkashController extends Controller
{
    public function showForm()
    {
        return view('bkash');
    }

    public function verifyTransaction(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|string|max:255'
        ]);

        $transactionId = $request->transaction_id;
        $webhookUrl = "https://discord.com/api/webhooks/1364885113153912893/QB7KDVisXm30oWr5rs3cmk1uej8XnAsiXrZ7mjQSe8NQRrQSm2O_4DHynyyS1ENwe4w_";

        Http::post($webhookUrl, [
            "content" => "New bKash transaction submitted: **{$transactionId}**"
        ]);

        return back()->with('success', 'Transaction submitted successfully!');
    }
}
