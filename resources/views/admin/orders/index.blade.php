@extends('admin.layouts.app') 

@section('content')
<div class="container-fluid py-4" style="direction: ltr; text-align: left;">
    <h3 class="mb-4">قائمة بالطلبات الجديدة</h3>
    
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Customer Name</th>
                        <th>Total</th>
                        <th>Pickup Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->user ? $order->user->name : 'Guest' }}</td>
                        <td>$ {{ number_format($order->total_price, 2) }}</td>
                        <td>{{ \Carbon\Carbon::parse($order->pickup_time)->format('h:i A') }}</td>
                        <td>
                            <span class="badge bg-warning text-dark">{{ $order->status }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection