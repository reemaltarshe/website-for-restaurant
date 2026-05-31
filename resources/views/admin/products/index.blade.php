@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mt-4 mb-4">
    <div>
        <h2>إدارة وجبات المطعم</h2>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a></li>
            <li class="breadcrumb-item active">الوجبات</li>
        </ol>
    </div>
    
    <x-button color="success" onclick="location.href='{{ route('admin.products.create') }}'">
        <i class="fas fa-plus me-2"></i> إضافة وجبة جديدة
    </x-button>
</div>
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert" style="border-radius: 8px;">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<x-table>
    <x-slot:thead>
        <th>ID</th>
        <th>صورة الوجبة</th>
        <th>اسم الوجبة</th>
        <th>السعر</th>
        <th>القسم</th>
        <th>العمليات</th>
       
    </x-slot:thead>

    @forelse($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>
            <img src="{{ asset('images/' . $product->image) }}" width="60" height="50" style="border-radius: 8px; object-fit: cover;">
        </td>
        <td>{{ $product->name }}</td>
        <td>${{ number_format($product->price, 2) }}</td>
        <td><span class="badge bg-info text-dark">{{ $product->category->name ?? 'بدون قسم' }}</span></td>
        <td>
            <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info btn-sm text-white me-1"><i class="fas fa-eye"></i> عرض</a>
            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm text-white me-1"><i class="fas fa-edit"></i> تعديل</a>
            
            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنتِ متأكدة من حذف هذه الوجبة؟')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> حذف</button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="5" class="text-center text-muted py-4">لا يوجد أي وجبات في المطعم حالياً. اضغطي على إضافة وجبة للبدء!</td>
    </tr>
    @endforelse
</x-table>
@endsection