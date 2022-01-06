<form action="{{ route('orders.store',['paymentMethod' => 'store-store']) }}" method="POST">
    @csrf

    <button type="submit">登入</button>
</form>
