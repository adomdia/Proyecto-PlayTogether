@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
<div class="container position-absolute top-50 start-50 translate-middle">
    <div class="row justify-content-center ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Prueba config') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
