@extends('admin.layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2>إضافة قسم جديد</h2>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">الأقسام</a></li>
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
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="form-label font-weight-bold">اسم القسم</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="مثال: بيتزا، برجر، مشروبات..." required>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-5">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary px-4 py-2" style="border-radius: 6px;">إلغاء</a>
                    <x-button type="submit" color="success">
                        <i class="fas fa-save me-1"></i> حفظ القسم
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection