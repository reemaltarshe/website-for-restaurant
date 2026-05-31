@extends('admin.layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="mb-4">
        <h2>تفاصيل الوجبة: {{ $product->name }}</h2>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">الوجبات</a></li>
            <li class="breadcrumb-item active">تفاصيل الوجبة</li>
        </ol>
    </div>

    <div class="card shadow-sm mb-4" style="border-radius: 10px; overflow: hidden;">
        <div class="row g-0">
            <div class="col-md-4 bg-light d-flex align-items-center justify-content-center p-3">
                <img src="{{ asset('images/' . $product->image) }}" class="img-fluid shadow-sm" style="border-radius: 8px; max-height: 300px; object-fit: cover;" alt="{{ $product->name }}">
            </div>
            
            <div class="col-md-8">
                <div class="card-body p-4 d-flex flex-column h-100">
                    <h3 class="card-title text-success mb-3">{{ $product->name }}</h3>
                    <hr>
                    
                    <h5 class="text-muted mb-2">السعر الحالي:</h5>
                    <p class="fs-4 fw-bold text-dark mb-4">${{ number_format($product->price, 2) }}</p>
                    
                    <h5 class="text-muted mb-2">مكونات الوجبة (الوصف):</h5>
                    <p class="card-text text-secondary bg-light p-3" style="border-radius: 6px; min-height: 80px; border-right: 4px solid #198754;">
                        {{ $product->description ?? 'لا يوجد وصف مضاف لهذه الوجبة حالياً.' }}
                    </p>
                    
                    <div class="mt-auto d-flex gap-2 justify-content-end">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary px-4" style="border-radius: 6px;">
                            <i class="fas fa-arrow-right me-1"></i> العودة للجدول
                        </a>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning text-white px-4" style="border-radius: 6px;">
                            <i class="fas fa-edit me-1"></i> تعديل البيانات
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection