<div class="card mb-4 shadow-sm" style="border-radius: 10px; overflow: hidden;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        {{ $thead }}
                    </tr>
                </thead>
                <tbody>
                    {{ $slot }}
                </tbody>
            </table>
        </div>
    </div>
</div>