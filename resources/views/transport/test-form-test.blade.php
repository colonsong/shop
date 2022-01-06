<form action="{{ route('orders.store',['paymentMethod' => 'test']) }}" method="POST">
    @csrf

    <button type="submit">登入</button>
</form>
