<div>

    @if ($message = Session::get('success'))
        <div class="tw-z-50 tw-fixed tw-top-20 tw-right-4 bg-success tw-text-white tw-p-4 tw-rounded tw-shadow-lg tw-hidden"
            id="notification">
            <p class="tw-flex tw-items-center">
                <span class="tw-mr-2">{{ $message }}</span>
                <button onclick="closeNotification()" class="tw-text-white tw-ml-2 tw-hover:tw-underline "><i
                        class="bi bi-x-circle-fill"></i></button>
            </p>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="tw-z-50 tw-fixed tw-top-20 tw-right-4 bg-danger tw-text-white tw-p-4 tw-rounded tw-shadow-lg tw-hidden"
            id="notification">
            <p class="tw-flex tw-items-center">
                <span class="tw-mr-2">{{ $message }}</span>
                <button onclick="closeNotification()" class="tw-text-white tw-ml-2 tw-hover:tw-underline "><i
                        class="bi bi-x-circle-fill"></i></button>
            </p>
        </div>
    @endif

    @if ($message = Session::get('warning'))
        <div class="tw-z-50 tw-fixed tw-top-20 tw-right-4 bg-warning tw-text-white tw-p-4 tw-rounded tw-shadow-lg tw-hidden"
            id="notification">
            <p class="tw-flex tw-items-center">
                <span class="tw-mr-2">{{ $message }}</span>
                <button onclick="closeNotification()" class="tw-text-white tw-ml-2 tw-hover:tw-underline "><i
                        class="bi bi-x-circle-fill"></i></button>
            </p>
        </div>
    @endif

    @if ($message = Session::get('info'))
        <div class="tw-z-50 tw-fixed tw-top-20 tw-right-4 bg-info tw-text-white tw-p-4 tw-rounded tw-shadow-lg tw-hidden"
            id="notification">
            <p class="tw-flex tw-items-center">
                <span class="tw-mr-2">{{ $message }}</span>
                <button onclick="closeNotification()" class="tw-text-white tw-ml-2 tw-hover:tw-underline "><i
                        class="bi bi-x-circle-fill"></i></button>
            </p>
        </div>
    @endif

    @if ($errors->any())
        <div class="tw-z-50 tw-fixed tw-top-20 tw-right-4 bg-success tw-text-white tw-p-4 tw-rounded tw-shadow-lg tw-hidden"
            id="notification">
            <p class="tw-flex tw-items-center">
                <span class="tw-mr-2"><strong>Please check the form below for errors</strong></span>
                <button onclick="closeNotification()" class="tw-text-white tw-ml-2 tw-hover:tw-underline "><i
                        class="bi bi-x-circle-fill"></i></button>
            </p>
        </div>
    @endif
</div>

<script>
    // Tampilkan notifikasi saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        showNotification();
    });

    // Fungsi untuk menampilkan notifikasi
    function showNotification() {
        const notification = document.getElementById('notification');
        notification.classList.remove('tw-hidden');

        // Otomatis tutup setelah 3 detik
        setTimeout(function() {
            closeNotification();
        }, 3000);
    }

    // Fungsi untuk menutup notifikasi
    function closeNotification() {
        const notification = document.getElementById('notification');
        notification.classList.add('tw-hidden');
    }
</script>
