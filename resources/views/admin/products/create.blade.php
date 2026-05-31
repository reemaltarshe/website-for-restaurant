@extends('admin.layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2>إضافة وجبة جديدة</h2>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">الوجبات</a></li>
                <li class="breadcrumb-item active">إضافة</li>
            </ol>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger shadow-sm" style="border-radius: 8px;">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm mb-4" style="border-radius: 10px;">
        <div class="card-body p-4">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="name" class="form-label font-weight-bold">اسم الوجبة</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="أدخلي اسم الوجبة المتميز..." required>
                </div>

                <div class="mb-4">
                    <label for="price" class="form-label font-weight-bold">السعر ($)</label>
                    <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" placeholder="0.00" required>
                </div>
                <div class="form-group mb-3">
                    <label for="discount_price" class="form-label" style="font-weight: 600;">Discount Price ($) <span class="text-muted">(Optional)</span></label>
                    <input type="number" step="0.01" name="discount_price" id="discount_price" class="form-control" 
                     value="{{ old('discount_price', $product->discount_price ?? '') }}" 
                     placeholder="Enter new price after discount">
                     @error('discount_price')
                      <small class="text-danger">{{ $message }}</small>
                     @enderror
                </div>
                <div class="mb-4">
                    <label for="category_id" class="form-label font-weight-bold">قسم الوجبة</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                   <option value="" selected disabled>اختارِي القسم المناسب للوجبة...</option>
                    @foreach($categories as $category)
                   <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                  </option>
                     @endforeach
                   </select>
                </div>
                <div class="mb-4">
                    <label for="image" class="form-label font-weight-bold">صورة الوجبة</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="form-label font-weight-bold">وصف الوجبة (مكوناتها)</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="أدخلي مكونات الوجبة أو وصفاً قصيراً لها..."></textarea>
</div>

                <div class="d-flex justify-content-end gap-2 mt-5">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary px-4 py-2" style="border-radius: 6px;">إلغاء</a>
                    <x-button type="submit" color="success">
                        <i class="fas fa-save me-1"></i> حفظ الوجبة
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection