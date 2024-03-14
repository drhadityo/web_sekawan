@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Persetujuan Screening -->
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Hasil Screening</h3>
            <p class="d-flex justify-content-center">{{ $screening['full_name'] }}</p>
            @if ($screening['is_positive'] == true)
            <div class="d-flex justify-content-center">
                <p class="fw-bold">Anda Positive TBC</p>
            </div>
            <p style="font-size: 16px;">Berikut adalah beberapa fasilitas kesehatan yang tersedia di kecamatan anda:</p>
            <ol style="font-size: 16px;">
                @foreach ($faskes as $item)
                <li>{{ $item->name }}</li>
                @endforeach
            </ol>
            <p style="font-size: 16px;">Formulir TBC:</p>
            <iframe src="{{ asset('document/screening.pdf') }}" width="100%" height="650px"></iframe>
            @else
            <div class="d-flex justify-content-center">
                <p class="fw-bold">Anda Tidak Positive TBC</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

<style>
    .card {
        border-radius: 16px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
    }

    .card-title {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .form-label {
        font-size: 16px;
    }

    .form-check-label {
        font-size: 16px;
        margin-left: 10px;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
</style>
