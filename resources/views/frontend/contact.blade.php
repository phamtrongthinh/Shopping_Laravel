@extends('frontend.partial.main')
@section('content')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('template/images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Liên hệ
        </h2>
    </section>
    {{-- bread crumb --}}
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
                Trang chủ
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Liên hệ
            </span>
        </div>
    </div>
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="flex-w flex-tr">
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form action="{{-- route('contact.storeAjax') --}}" data-url="{{-- route('contact.storeAjax') --}}" data-ajax="submit02"
                        data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST"
                        name="frm" id="frm">
                        <input type="hidden" name="title" value="THÔNG TIN LIÊN HỆ">
                        <input type="hidden" name="robot_check" value="" id="robot_check">
                        @csrf
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Gửi Tin Nhắn Cho Chúng Tôi
                        </h4>
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="name"
                                placeholder="Tên">
                            <i class="fa-solid fa-user how-pos4 pointer-none"></i>
                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email"
                                placeholder="Địa chỉ Email của bạn">
                            <i class="fa-solid fa-envelope how-pos4 pointer-none"></i>
                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="phone"
                                placeholder="Số điện thoại">
                            <i class="fa-solid fa-phone how-pos4 pointer-none"></i>
                        </div>


                        <div class="bor8 m-b-30">
                            <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="content"
                                placeholder="Chúng tôi có thể giúp gì cho bạn?"></textarea>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                            Gửi
                        </button>
                    </form>
                </div>

                <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                    <div class="flex-w w-full p-b-42">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-map-marker"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Địa chỉ
                            </span>

                            <p class="stext-115 cl6 size-213 p-t-18">
                                Số 47 Đường Thanh Liệt, Thanh Quang, Thanh Trì, Hà Nội, Việt Nam
                            </p>

                        </div>
                    </div>

                    <div class="flex-w w-full p-b-42">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-phone-handset"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Hãy gọi cho chúng tôi
                            </span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                039.694.5033
                            </p>
                        </div>
                    </div>


                    <div class="flex-w w-full">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-envelope"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Hỗ Trợ mua hàng
                            </span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                thuphuong2002@gmail.com
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Bản đồ Google -->
    <div class="map-container" style="margin-top: 40px;">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.621653142358!2d105.81657577471279!3d20.96770378987392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acfcef5667d3%3A0xd84fdb2954b2c9d4!2zNDcgxJAuVGhhbmggTGnhu4d0LCBUaGFuaCBRdWFuZywgVGhhbmggVHLDrCwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1744468624111!5m2!1svi!2s"
            width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection

@section('js')
    <script>
        $(document).on('submit', "[data-ajax='submit02']", function(event) {
            event.preventDefault();
            console.log('Click');
            let myThis = $(this);
            let formValues = $(this).serialize();
            let dataInput = $(this).data();

            var nameVal = myThis.find('[name="name"]').val().trim();
            var emailVal = myThis.find('[name="email"]').val().trim();
            var phoneVal = myThis.find('[name="phone"]').val().trim();

            let isEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            let isPhone = /^(0[2-9]{1}[0-9]{8})$/;
            let robotCheckVal = myThis.find('[name="robot_check"]').val().trim();

            if (robotCheckVal !== '') {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: "Yêu cầu không hợp lệ!",
                    showConfirmButton: false,
                    timer: 1500
                });
                return false;
            }

            if (nameVal === '') {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Vui lòng nhập Tên!',
                    showConfirmButton: false,
                    timer: 1500
                });
                return false;
            }

            if (emailVal === '') {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Vui lòng nhập email!',
                    showConfirmButton: false,
                    timer: 1500
                });
                return false;
            } else if (!(isEmail.test(emailVal))) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Vui lòng nhập email hợp lệ!',
                    showConfirmButton: false,
                    timer: 1500
                });
                return false;
            }

            if (phoneVal === '') {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Vui lòng nhập số điện thoại!',
                    showConfirmButton: false,
                    timer: 1500
                });
                return false;
            } else if (!(isPhone.test(phoneVal))) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Vui lòng nhập số điện thoại hợp lệ!',
                    showConfirmButton: false,
                    timer: 1500
                });
                return false;
            }

            $.ajax({
                type: dataInput.method,
                url: dataInput.url,
                data: formValues,
                dataType: "json",
                success: function(response) {
                    if (response.code == 200) {
                        myThis.find('input:not([type="hidden"]), textarea:not([type="hidden"])').val(
                            '');
                        if (dataInput.content) {
                            $(dataInput.content).html(response.html);

                        }
                        if (dataInput.target) {
                            switch (dataInput.target) {
                                case 'modal':
                                    $(dataInput.href).modal();
                                    break;
                                case 'alert':
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: response.html,
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                default:
                                    break;
                            }
                        }
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: response.html,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                },
                error: function(response) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Gửi thông tin thấy bại',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
            return false;
        });
    </script>
@endsection
