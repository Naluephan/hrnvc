@extends('layouts.app')
<head>
    <title>WELCOME TO WEBSITE</title>
</head>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('TEST Systems') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('ยินดีต้อนรับ') }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
