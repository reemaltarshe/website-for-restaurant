@extends('admin.layouts.app')

@section('content')
<div class="mt-4 mb-4">
    <h2>إدارة المستخدمين المسجلين</h2>
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a></li>
        <li class="breadcrumb-item active">قائمة المستخدمين</li>
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
        <th>اسم المستخدم</th>
        <th>البريد الإلكتروني</th>
        <th>تاريخ الانضمام</th>
        <th>العمليات</th>
    </x-slot:thead>

    @forelse($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td class="fw-bold"><i class="fas fa-user-circle text-muted me-2"></i> {{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td><i class="far fa-clock text-muted me-1"></i> {{ $user->created_at->format('Y-m-d (h:i A)') }}</td>
        <td>
            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنتِ متأكدة من حذف حساب هذا المستخدم نهائياً من السيستم؟')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-user-minus"></i> حذف الحساب</button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="5" class="text-center text-muted py-4">لا يوجد أي مستخدمين مسجلين حالياً.</td>
    </tr>
    @endforelse
</x-table>
@endsection