@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mt-4 mb-4">
    <div>
        <h2>إدارة أقسام المطعم</h2>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a></li>
            <li class="breadcrumb-item active">الأقسام</li>
        </ol>
    </div>
    
    <x-button color="success" onclick="location.href='{{ route('admin.categories.create') }}'">
        <i class="fas fa-plus me-2"></i> إضافة قسم جديد
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
        <th>اسم القسم</th>
        <th>الرابط اللطيف (Slug)</th>
        <th>العمليات</th>
    </x-slot:thead>

    @forelse($categories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td><strong>{{ $category->name }}</strong></td>
        <td><span class="badge bg-light text-secondary border px-2 py-1">{{ $category->slug }}</span></td>
        <td>
            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning btn-sm text-white me-1"><i class="fas fa-edit"></i> تعديل</a>
            
            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنتِ متأكدة من حذف هذا القسم؟ الحذف قد يؤثر على الوجبات التابعة له!')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> حذف</button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="4" class="text-center text-muted py-4">لا يوجد أي أقسام حالياً. اضغطي على إضافة قسم جديد للبدء!</td>
    </tr>
    @endforelse
</x-table>
@endsection