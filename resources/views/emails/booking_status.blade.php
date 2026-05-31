<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: 'Arial', sans-serif; background-color: #f4f4f4; padding: 20px; text-align: right; }
        .card { background: white; border-radius: 15px; padding: 30px; max-width: 500px; margin: 0 auto; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-top: 5px solid #ffbe33; }
        h2 { color: #222831; }
        .status-approved { color: #28a745; font-weight: bold; font-size: 18px; }
        .status-rejected { color: #dc3545; font-weight: bold; font-size: 18px; }
        .details { background: #f9f9f9; padding: 15px; border-radius: 10px; margin-top: 20px; }
        .footer { margin-top: 20px; font-size: 12px; color: #777; text-align: center; }
    </style>
</head>
<body>

    <div class="card">
        <h2>مرحباً بكِ، {{ $book->name }} ✨</h2>
        <p>نود إعلامكِ بتحديث جديد بخصوص طلب حجز الطاولة الخاص بكِ في مطعم <strong>Feane</strong>:</p>

        @if($book->status == 'approved')
            <p class="status-approved">🎉 تم قبول حجزكِ بنجاح! نحن بانتظار تشريفكِ لنا.</p>
        @else
            <p class="status-rejected">😔 نعتذر منكِ بشدة، لقد تم رفض طلب الحجز لعدم توفر طاولات شاغرة في الوقت الحالي.</p>
        @endif

        <div class="details">
            <p><strong>📅 تاريخ ووقت الحجز:</strong> {{ $book->date }}</p>
            <p><strong>🪑 عدد المقاعد:</strong> {{ $book->chairs }}</p>
        </div>

        <hr style="border: 0; border-top: 1px solid #eee; margin: 20px 0;">
        
        <div style="direction: ltr; text-align: left; margin-top: 20px;">
            <h3>Hello, {{ $book->name }} ✨</h3>
            @if($book->status == 'approved')
                <p style="color: #28a745; font-weight: bold;">🎉 Your booking has been Approved successfully! We look forward to serving you.</p>
            @else
                <p style="color: #dc3545; font-weight: bold;">😔 We are sorry, your booking request has been Declined due to full occupancy.</p>
            @endif
        </div>

        <div class="footer">
            <p>شكرًا لاختياركِ مطعم Feane © 2026</p>
        </div>
    </div>

</body>
</html>