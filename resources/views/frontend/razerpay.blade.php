<!DOCTYPE html>
<html>
<head>
    <title>Pay with Razorpay</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <h2>Order #{{ $order->id }}</h2>
    <h3>Amount: ₹{{ $order->total_amount }}</h3>

    <button id="pay-btn">Pay Now</button>

    <form id="payment-response" action="{{ route('payment.callback') }}" method="POST" style="display:none;">
        @csrf
        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
        <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
        <input type="hidden" name="razorpay_signature" id="razorpay_signature">
    </form>

    <script>
        document.getElementById('pay-btn').onclick = function(e){
            var options = {
                "key": "{{ $key }}",
                "amount": "{{ $razorpayOrder->amount }}",
                "currency": "INR",
                "name": "My App",
                "description": "Order #{{ $order->id }}",
                "order_id": "{{ $razorpayOrder->id }}",
                "handler": function (response){
                    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                    document.getElementById('razorpay_order_id').value = response.razorpay_order_id;
                    document.getElementById('razorpay_signature').value = response.razorpay_signature;
                    document.getElementById('payment-response').submit();
                },
                "theme": {
                    "color": "#3399cc"
                }
            };
            var rzp = new Razorpay(options);
            rzp.open();
            e.preventDefault();
        }
    </script>
</body>
</html>
