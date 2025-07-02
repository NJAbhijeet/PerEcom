<?php

namespace App\Http\Controllers\Web;

use Razorpay\Api\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RazerpayController extends Controller
{
     protected $razorpay;

    public function __construct()
    {
        $this->razorpay = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
    }

    /**
     * Show Razorpay payment form.
     */
    public function showPaymentForm($orderId)
    {
        $order = Order::findOrFail($orderId);

        // Create Razorpay order
        $razorpayOrder = $this->razorpay->order->create([
            'receipt'         => 'order_rcpt_' . $order->id,
            'amount'          => $order->total_amount * 100, // in paise
            'currency'        => 'INR',
            'payment_capture' => 1
        ]);

        $order->update(['razorpay_order_id' => $razorpayOrder->id]);

        return view('payment.razorpay', [
            'order' => $order,
            'razorpayOrder' => $razorpayOrder,
            'key' => config('services.razorpay.key')
        ]);
    }

    /**
     * Handle payment callback.
     */
    public function handlePaymentCallback(Request $request)
    {
        $request->validate([
            'razorpay_payment_id' => 'required|string',
            'razorpay_order_id'   => 'required|string',
            'razorpay_signature'  => 'required|string',
        ]);

        $order = Order::where('razorpay_order_id', $request->razorpay_order_id)->firstOrFail();

        $generatedSignature = hash_hmac(
            'sha256',
            $request->razorpay_order_id . "|" . $request->razorpay_payment_id,
            config('services.razorpay.secret')
        );

        if ($generatedSignature === $request->razorpay_signature) {
            // Payment verified successfully
            Payment::create([
                'order_id'       => $order->id,
                'transaction_id' => $request->razorpay_payment_id,
                'payment_status' => 'success',
                'amount'         => $order->total_amount,
            ]);

            $order->update(['payment_status' => 'paid']);

            return redirect()->route('payment.success', ['orderId' => $order->id]);
        } else {
            Log::error('Payment signature verification failed for order ID: ' . $order->id);

            return redirect()->route('payment.failed', ['orderId' => $order->id]);
        }
    }

    /**
     * Payment success view.
     */
    public function paymentSuccess($orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('payment.success', compact('order'));
    }

    /**
     * Payment failed view.
     */
    public function paymentFailed($orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('payment.failed', compact('order'));
    }
}
