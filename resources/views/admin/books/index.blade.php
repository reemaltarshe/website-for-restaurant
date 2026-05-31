@extends('admin.layouts.app')

@section('content')
<div class="mt-4 mb-4">
    <h2>إدارة حجوزات الطاولات</h2>
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a></li>
        <li class="breadcrumb-item active">طلبات الحجز</li>
    </ol>
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
        <th>اسم الزبون</th>
        <th>رقم الهاتف</th>
        <th>البريد الإلكتروني</th>
        <th>عدد المقاعد</th>
        <th>تاريخ ووقت الحجز</th>
        <th>الحالة</th> <th>العمليات</th>
    </x-slot:thead>

    @forelse($bookings as $book)
    <tr>
        <td>{{ $book->id }}</td>
        <td class="fw-bold">{{ $book->name }}</td>
        <td>{{ $book->phone_number }}</td>
        <td>{{ $book->email }}</td>
        <td>
            <span class="badge bg-secondary px-2 py-1" style="border-radius: 6px;">
                <i class="fas fa-chair me-1"></i> {{ $book->chairs }} كراسي
            </span>
        </td>
        <td><i class="far fa-calendar-alt me-1 text-muted"></i> {{ $book->date }}</td>
        
        <td>
            @if($book->status == 'pending')
                <span class="badge bg-warning text-dark px-2 py-1" style="border-radius: 6px;">قيد الانتظار</span>
            @elseif($book->status == 'approved')
                <span class="badge bg-success px-2 py-1" style="border-radius: 6px;">مقبول ✅</span>
            @else
                <span class="badge bg-danger px-2 py-1" style="border-radius: 6px;">مرفوض ❌</span>
            @endif
        </td>

        <td>
            <div class="d-flex align-items-center gap-1">
            @if($book->status == 'pending')
                <form action="{{ route('admin.books.updateStatus', $book->id) }}" method="POST" style="display:inline;">
                    @csrf 
                    @method('PATCH')
                    <input type="hidden" name="status" value="approved">
             <button type="submit" class="btn btn-success btn-sm" style="border-radius: 6px; white-space: nowrap;">
                    <i class="fas fa-check"></i> قبول
                </button>
                </form>

                <form action="{{ route('admin.books.updateStatus', $book->id) }}" method="POST" style="display:inline;">
                    @csrf 
                    @method('PATCH')
                    <input type="hidden" name="status" value="rejected">
                <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 6px; white-space: nowrap;">
                    <i class="fas fa-times"></i> رفض
                </button>
                </form>
            @endif

            <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنتِ متأكدة من حذف أو إلغاء هذا الحجز؟')">
                @csrf
                @method('DELETE')
               <button type="submit" class="btn btn-outline-danger btn-sm" style="border-radius: 6px; white-space: nowrap;">
                <i class="fas fa-trash"></i> حذف
            </button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="8" class="text-center text-muted py-4">لا يوجد أي طلبات حجز طاولات حالياً في السيستم.</td>
    </tr>
    @endforelse
</x-table>
@endsection