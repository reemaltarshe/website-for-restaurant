<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        
        <title>Dashboard - Feane Admin</title>
        
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        
        <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
        
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
     <body class="sb-nav-fixed">
        @include('admin.layouts.navbar')

        <div id="layoutSidenav">
            @include('admin.layouts.sidebar')

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    @yield('content')
                    </div>
                </main>
                
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Feane Restaurant 2026</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('admin/js/scripts.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        @yield('scripts')
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    // تفعيل الـ Log لمتابعة المشاكل
    Pusher.logToConsole = true;

    // الاتصال
    var pusher = new Pusher('5dc351f4e6d4fe449aae', {
        cluster: 'mt1'
    });

   
    var channel = pusher.subscribe('restaurant-channel');

    
    channel.bind('new-order', function(data) {
    console.log('🎉 وصل الطلب:', data);
    
    new Audio('https://assets.mixkit.co/active_storage/sfx/2869/2869-600.wav').play().catch(e => console.log(e));

    var list = document.getElementById('notification-list');
    if (list) {
        var newItem = document.createElement('li');
        newItem.innerHTML = `
            <a class="dropdown-item py-2 border-bottom text-end" href="{{ route('admin.orders.index') }}" style="background-color: #e3f2fd;">
                <div class="fw-bold">🍔 طلب جديد من: ${data.order.name}</div>
                <div class="text-muted">الإجمالي: ${data.order.total}</div>
            </a>
        `;
        list.insertBefore(newItem, list.firstChild);
    }

    var notificationBox = document.createElement('div');
    notificationBox.style.cssText = "position:fixed; top:20px; right:20px; background-color:#222831; color:#fff; padding:20px; border-radius:12px; box-shadow:0 10px 30px rgba(0,0,0,0.3); border-right:6px solid #007bff; z-index:99999; font-family:Arial, sans-serif; direction:rtl; min-width:320px; animation: slideIn 0.5s;";
    
    notificationBox.innerHTML = `
        <div style="font-weight: bold; margin-bottom: 5px; color: #007bff; font-size: 16px;">🔔 طلب جديد!</div>
        <div style="font-size: 14px;">وصل طلب جديد من: <strong>${data.order.name}</strong></div>
        <div style="font-size: 12px; color: #aaa; margin-top: 5px;">الإجمالي: ${data.order.total} ريال</div>
    `;
    document.body.appendChild(notificationBox);

    
    setTimeout(function() {
        notificationBox.style.opacity = '0';
        notificationBox.style.transition = 'opacity 0.5s';
        setTimeout(function() { notificationBox.remove(); }, 500);
    }, 7000);
});
</script>
    </body>
</html>