<style>
    /* Toast chung */
    .toast {
        position: fixed;
        top: 10px;
        right: -300px;
        /* Bắt đầu ngoài màn hình */
        padding: 15px 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        transition: right 0.5s ease;
        /* Hiệu ứng trượt vào */
        max-width: 300px;
        z-index: 9999;
        height: fit-content;
        color: white;
    }

    /* Toast thành công (Success) */
    #toast-success {
        background-color: #42b72a;
        /* Màu xanh lá cho success */
    }

    /* Toast lỗi (Error) */
    #toast-error {
        background-color: #e53e3e;
        /* Màu đỏ cho error */
    }

    .toast.show {
        right: 20px;
        /* Đẩy toast vào trong màn hình */
    }

    .toast.hide {
        right: -500px;
        /* Đưa toast về lại ngoài màn hình */
    }

    .toast p {
        margin: 0;
    }
</style>
<!-- Hiển thị thông báo thành công -->
@if (session('success'))
    <div id="toast-success" class="toast">
        <p>{{ session('success') }}</p>
    </div>
@endif

<!-- Hiển thị thông báo lỗi -->
@if (session('error'))
    <div id="toast-error" class="toast">
        <p>{{ session('error') }}</p>
    </div>
@endif

<script>
    // Hiển thị toast thành công
    window.onload = function() {
        var toastSuccess = document.getElementById('toast-success');
        var toastError = document.getElementById('toast-error');

        // Nếu có toast thành công
        if (toastSuccess) {
            toastSuccess.classList.add('show');
            setTimeout(function() {
                toastSuccess.classList.remove('show');
                toastSuccess.classList.add('hide');
            }, 3000);
        }

        // Nếu có toast lỗi
        if (toastError) {
            toastError.classList.add('show');
            setTimeout(function() {
                toastError.classList.remove('show');
                toastError.classList.add('hide');
            }, 3000);
        }
    };
</script>
