@extends('admin.layouts.app')

@section('content')
<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">نظرة عامة على المطعم</li>
</ol>

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">إجمالي الوجبات: <span class="fw-bold">{{ $productsCount }}</span></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ route('admin.products.index') }}">عرض التفاصيل</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">طلبات الحجز الجديدة: <span class="fw-bold">{{ $booksCount }}</span></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ route('admin.books.index') }}">عرض التفاصيل</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">إجمالي الأرباح: <span class="fw-bold">{{ $totalEarnings }}</span></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" data-bs-target="#earningsModal" style="cursor: pointer;">عرض التفاصيل</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">المستخدمين المسجلين: <span class="fw-bold">{{ $usersCount }}</span></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ route('admin.users.index') }}">عرض التفاصيل</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5 pt-2">
    
    <div class="col-xl-8 col-lg-7 d-flex align-items-stretch">
        <div class="card mb-4 shadow-sm w-100" style="border-radius: 12px;">
            <div class="card-header bg-dark text-white d-flex align-items-center justify-content-between" style="border-top-left-radius: 12px; border-top-right-radius: 12px; direction: rtl;">
                <div>
                    <i class="fas fa-chart-area me-1 text-warning"></i>
                    <span class="fw-bold">مخطط نمو المستخدمين المسجلين (2026)</span>
                </div>
                <small class="text-muted text-white-50">تحديث تلقائي</small>
            </div>
            <div class="card-body bg-white" style="border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;">
                <canvas id="usersChart" width="100%" height="38"></canvas>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-5 d-flex align-items-stretch">
        <div class="card mb-4 shadow-sm w-100" style="border-radius: 12px;">
            <div class="card-header bg-dark text-white text-end" style="border-top-left-radius: 12px; border-top-right-radius: 12px; direction: rtl;">
                <i class="fas fa-chart-pie me-1 text-info"></i>
                <span class="fw-bold">تحليل حالات طلبات الحجز</span>
            </div>
            <div class="card-body bg-white d-flex flex-column align-items-center justify-content-center" style="border-bottom-left-radius: 12px; border-bottom-right-radius: 12px; padding: 15px;">
                <canvas id="bookingPieChart" style="max-height: 195px; max-width: 195px; width: 100%; height: 100%;"></canvas>
            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="earningsModal" tabindex="-1" aria-labelledby="earningsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="border-radius: 15px;">
            <div class="modal-header bg-success text-white" style="border-top-left-radius: 15px; border-top-right-radius: 15px; direction: rtl;">
                <h5 class="modal-title fw-bold" id="earningsModalLabel">📁 تفاصيل أرباح العربون المستلمة</h5>
                <button type="button" class="btn-close btn-close-white ms-0 me-auto" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-light" style="direction: rtl;">
                <p class="text-muted mb-3">هذه القائمة تعرض تفاصيل الحجوزات المؤكدة (Approved) وقيمة العربون المستلم من كل حجز:</p>
                
                <div class="table-responsive">
                    <table class="table table-bordered table-striped bg-white text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>اسم الحاجز</th>
                                <th>عدد الكراسي</th>
                                <th>العربون المحسوب</th>
                                <th>حالة الحجز</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($approvedBookingsList as $booking)
                                <tr>
                                    <td class="fw-bold text-dark">{{ $booking->name }}</td>
                                    <td><span class="badge bg-secondary p-2">{{ $booking->chairs }} كراسي</span></td>
                                    <td class="text-success fw-bold">$50</td> 
                                    <td><span class="badge bg-success">مقبول ومؤكد</span></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-muted py-3">لا توجد حجوزات مقبولة حتى الآن لحساب الأرباح.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="alert alert-success text-start fw-bold mt-3 mb-0 d-flex justify-content-between align-items-center">
                    <span>إجمالي أرباح المحفظة الحالية:</span>
                    <span style="font-size: 1.2rem;">${{ $totalEarnings }}</span>
                </div>
            </div>
            <div class="modal-footer bg-light" style="border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق النافذة</button>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
     
   Pusher.logToConsole = true;
    var pusher = new Pusher('5dc351f4e6d4fe449aae', { cluster: 'mt1' });
    var channel = pusher.subscribe('restaurant-channel');

 
    channel.bind_global(function(eventName, data) {
        console.log("وصل حدث باسم:", eventName); 
        console.log("البيانات:", data);

       
        if (eventName.includes('BookingCreated')) {
             alert("حجز جديد باسم: " + data.book.name);
         
        }
    });

        var ctx = document.getElementById('usersChart').getContext('2d');
        var usersData = @json($monthsData); 

        var usersChart = new Chart(ctx, {
            type: 'line', 
            data: {
                labels: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'],
                datasets: [{
                    label: 'المستخدمين الجدد',
                    data: usersData, 
                    lineTension: 0.3, 
                    backgroundColor: "rgba(255, 190, 51, 0.2)",
                    borderColor: "rgba(255, 190, 51, 1)", 
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 190, 51, 1)",
                    pointBorderColor: "rgba(255, 255, 255, 0.8)",
                    pointHoverRadius: 7,
                    pointHoverBackgroundColor: "rgba(255, 190, 51, 1)",
                    fill: true 
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        grid: { display: false }
                    },
                    y: {
                        min: 0,
                        ticks: { stepSize: 1 } 
                    }
                },
                plugins: {
                    legend: { display: false } 
                }
            }
        });

        var ctxPie = document.getElementById('bookingPieChart').getContext('2d');
        
        var pendingCount  = {{ $pendingBooks }};
        var approvedCount = {{ $approvedBooks }};
        var rejectedCount = {{ $rejectedBooks }};

        var bookingPieChart = new Chart(ctxPie, {
            type: 'doughnut',
            data: {
                labels: ['قيد الانتظار (Pending)', 'مقبولة (Approved)', 'مرفوضة (Rejected)'],
                datasets: [{
                    data: [pendingCount, approvedCount, rejectedCount],
                    backgroundColor: [
                        '#ffbe33', 
                        '#198754', 
                        '#dc3545' 
                    ],
                    borderWidth: 2,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom', 
                        labels: {
                            boxWidth: 12,
                            font: { size: 11, fontFamily: 'Arial' }
                        }
                    }
                }
            }
        });

    </script>
@endsection
@endsection