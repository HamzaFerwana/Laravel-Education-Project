@extends('site.master')
@section('title', 'Payment Status | ' . env('APP_NAME'))

@section('content')
    <section class="ftco-section">
        <div class="container">
            @if (session('msg'))
                <div class="alert alert-{{ session('type') }}">
                    <h2 class="text-center">{{ session('msg') }}</h2>
                </div>
            @endif
        </div>
    </section>
@endsection

@section('scripts')
<script>
    setTimeout(() => {
        window.location.replace('http://127.0.0.1:8000/genius');
    }, 3000);
</script>
@endsection
