@extends('layouts.app')
@extends('layouts.navbar')

@section('content')

<div class="home">
<form action="{{ route('procesar.pago') }}" method="POST">
    @csrf
    <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="{{ env('STRIPE_KEY') }}"
        data-amount="1000"
        data-name="Nombre del producto o servicio"
        data-description="Descripción del producto o servicio"
        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
        data-locale="auto"
        data-currency="usd">
    </script>
</form>

</div>
@endsection
