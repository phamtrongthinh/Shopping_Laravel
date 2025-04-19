@if (session('success') || session('error'))
    <div id="alert-message" class="alert-box {{ session('success') ? 'success' : 'error' }}">
        <i class="fas {{ session('success') ? 'fa-check-circle' : 'fa-exclamation-triangle' }}"></i>
        {{ session('success') ?? session('error') }}
    </div>
@endif

<style>
    .alert-box {
        position: fixed;
        top: 20px;
        right: 20px;
        /* chuyển sang phải */
        transform: none;
        /* bỏ translateX */
        padding: 12px 20px;
        border-radius: 8px;
        font-weight: bold;
        font-size: 16px;
        z-index: 9999;
        color: #fff;
        display: flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.3s ease-in-out;
    }

    .alert-box.success {
        background-color: #8E7DBE;
    }

    .alert-box.error {
        background-color: #f44336;
    }

    @keyframes fadeOut {
        to {
            opacity: 0;
            transform: translateY(-20px);
            /* chỉ dịch lên trên */
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alert = document.getElementById('alert-message');
        if (alert) {
            setTimeout(() => {
                alert.style.animation = 'fadeOut 0.5s forwards';
                setTimeout(() => alert.remove(), 500); // remove khỏi DOM sau khi ẩn xong
            }, 5000);
        }
    });
</script>
