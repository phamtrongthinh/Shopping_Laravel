@extends('main')
@section('content')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('template/images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Contact
        </h2>
    </section>
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="flex-w flex-tr">
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form>
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Send Us A Message
                        </h4>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email"
                                placeholder="Your Email Address">
                            <img class="how-pos4 pointer-none" src="template/images/icons/icon-email.png" alt="ICON">
                        </div>

                        <div class="bor8 m-b-30">
                            <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="How Can We Help?"></textarea>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                            Submit
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
                                Address
                            </span>

                            <p class="stext-115 cl6 size-213 p-t-18">
                                Coza Store Center 8th floor, 379 Hudson St, New York, NY 10018 US
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full p-b-42">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-phone-handset"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Lets Talk
                            </span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                +1 800 1236879
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-envelope"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Sale Support
                            </span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                contact@example.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="map">
        <div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="template/images/icons/pin.png"
            data-scrollwhell="0" data-draggable="1" data-zoom="11" style="position: relative; overflow: hidden;">
            <div
                style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                <div><button draggable="false" aria-label="Phím tắt" title="Phím tắt" type="button"
                        style="background: none transparent; display: block; border: none; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; z-index: 1000002; outline-offset: 3px; right: 0px; bottom: 0px; transform: translateX(100%);"></button>
                </div>
                <div tabindex="0" aria-label="Bản đồ" aria-roledescription="bản đồ" role="region"
                    aria-describedby="FFBDA2B8-1FAC-4EDC-B7FC-007E5497BF94"
                    style="position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px;">
                    <div id="FFBDA2B8-1FAC-4EDC-B7FC-007E5497BF94" style="display: none;">
                        <div class="LGLeeN-keyboard-shortcuts-view">
                            <table>
                                <tbody>
                                    <tr>
                                        <td><kbd aria-label="Mũi tên trái">←</kbd></td>
                                        <td aria-label="Di chuyển sang trái.">Di chuyển sang trái</td>
                                    </tr>
                                    <tr>
                                        <td><kbd aria-label="Mũi tên phải">→</kbd></td>
                                        <td aria-label="Di chuyển sang phải.">Di chuyển sang phải</td>
                                    </tr>
                                    <tr>
                                        <td><kbd aria-label="Mũi tên lên">↑</kbd></td>
                                        <td aria-label="Di chuyển lên.">Di chuyển lên</td>
                                    </tr>
                                    <tr>
                                        <td><kbd aria-label="Mũi tên xuống">↓</kbd></td>
                                        <td aria-label="Di chuyển xuống.">Di chuyển xuống</td>
                                    </tr>
                                    <tr>
                                        <td><kbd>+</kbd></td>
                                        <td aria-label="Phóng to.">Phóng to</td>
                                    </tr>
                                    <tr>
                                        <td><kbd>-</kbd></td>
                                        <td aria-label="Thu nhỏ.">Thu nhỏ</td>
                                    </tr>
                                    <tr>
                                        <td><kbd>Di chuyển lên trên</kbd></td>
                                        <td aria-label="Di chuyển sang trái 75%.">Di chuyển sang trái 75%</td>
                                    </tr>
                                    <tr>
                                        <td><kbd>Di chuyển xuống dưới</kbd></td>
                                        <td aria-label="Di chuyển sang phải 75%.">Di chuyển sang phải 75%</td>
                                    </tr>
                                    <tr>
                                        <td><kbd>Di chuyển lên</kbd></td>
                                        <td aria-label="Di chuyển lên trên 75%.">Di chuyển lên trên 75%</td>
                                    </tr>
                                    <tr>
                                        <td><kbd>Di chuyển xuống</kbd></td>
                                        <td aria-label="Di chuyển xuống dưới 75%.">Di chuyển xuống dưới 75%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="gm-style"
                    style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;">
                    <div
                        style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: pan-x pan-y;">
                        <div
                            style="z-index: 1; position: absolute; left: 50%; top: 50%; width: 100%; will-change: transform; transform: translate(0px, 0px);">
                            <div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;">
                                <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                                    <div
                                        style="position: absolute; z-index: 989; transform: matrix(1, 0, 0, 1, -171, -43);">
                                        <div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;">
                                            <div style="width: 256px; height: 256px;"></div>
                                        </div>
                                        <div
                                            style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px;">
                                            <div style="width: 256px; height: 256px;"></div>
                                        </div>
                                        <div
                                            style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px;">
                                            <div style="width: 256px; height: 256px;"></div>
                                        </div>
                                        <div
                                            style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px;">
                                            <div style="width: 256px; height: 256px;"></div>
                                        </div>
                                        <div
                                            style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px;">
                                            <div style="width: 256px; height: 256px;"></div>
                                        </div>
                                        <div
                                            style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;">
                                            <div style="width: 256px; height: 256px;"></div>
                                        </div>
                                        <div
                                            style="position: absolute; left: -512px; top: 0px; width: 256px; height: 256px;">
                                            <div style="width: 256px; height: 256px;"></div>
                                        </div>
                                        <div
                                            style="position: absolute; left: -512px; top: -256px; width: 256px; height: 256px;">
                                            <div style="width: 256px; height: 256px;"></div>
                                        </div>
                                        <div
                                            style="position: absolute; left: 512px; top: -256px; width: 256px; height: 256px;">
                                            <div style="width: 256px; height: 256px;"></div>
                                        </div>
                                        <div
                                            style="position: absolute; left: 512px; top: 0px; width: 256px; height: 256px;">
                                            <div style="width: 256px; height: 256px;"></div>
                                        </div>
                                        <div
                                            style="position: absolute; left: -768px; top: 0px; width: 256px; height: 256px;">
                                            <div style="width: 256px; height: 256px;"></div>
                                        </div>
                                        <div
                                            style="position: absolute; left: -768px; top: -256px; width: 256px; height: 256px;">
                                            <div style="width: 256px; height: 256px;"></div>
                                        </div>
                                        <div
                                            style="position: absolute; left: 768px; top: -256px; width: 256px; height: 256px;">
                                            <div style="width: 256px; height: 256px;"></div>
                                        </div>
                                        <div
                                            style="position: absolute; left: 768px; top: 0px; width: 256px; height: 256px;">
                                            <div style="width: 256px; height: 256px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div>
                            <div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div>
                            <div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;">
                                <div
                                    style="width: 60px; height: 74px; overflow: hidden; position: absolute; left: -30px; top: -74px; z-index: 0;">
                                    <img alt="" src="template/images/icons/pin.png" draggable="false"
                                        style="position: absolute; left: 0px; top: 0px; user-select: none; width: 60px; height: 74px; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                </div>
                                <div style="position: absolute; left: 0px; top: 0px; z-index: -1;">
                                    <div
                                        style="position: absolute; z-index: 989; transform: matrix(1, 0, 0, 1, -171, -43);">
                                        <div
                                            style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 0px;">
                                        </div>
                                        <div
                                            style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: 0px;">
                                        </div>
                                        <div
                                            style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: -256px;">
                                        </div>
                                        <div
                                            style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: -256px;">
                                        </div>
                                        <div
                                            style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: -256px;">
                                        </div>
                                        <div
                                            style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 0px;">
                                        </div>
                                        <div
                                            style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -512px; top: 0px;">
                                        </div>
                                        <div
                                            style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -512px; top: -256px;">
                                        </div>
                                        <div
                                            style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 512px; top: -256px;">
                                        </div>
                                        <div
                                            style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 512px; top: 0px;">
                                        </div>
                                        <div
                                            style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -768px; top: 0px;">
                                        </div>
                                        <div
                                            style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -768px; top: -256px;">
                                        </div>
                                        <div
                                            style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 768px; top: -256px;">
                                        </div>
                                        <div
                                            style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 768px; top: 0px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                                <div style="position: absolute; z-index: 989; transform: matrix(1, 0, 0, 1, -171, -43);">
                                    <div
                                        style="position: absolute; left: 512px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear;">
                                        <img draggable="false" alt="" role="presentation"
                                            src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i11!2i605!3i770!4i256!2m3!1e0!2sm!3i728485817!2m3!1e2!6m1!3e5!3m18!2svi-VN!3sUS!5e18!12m5!1e68!2m2!1sset!2sRoadmap!4e2!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m2!1e3!5f2!23i47083502&amp;key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes&amp;token=67357"
                                            style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                    </div>
                                    <div
                                        style="position: absolute; left: 768px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear;">
                                        <img draggable="false" alt="" role="presentation"
                                            src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i11!2i606!3i770!4i256!2m3!1e0!2sm!3i728485817!2m3!1e2!6m1!3e5!3m18!2svi-VN!3sUS!5e18!12m5!1e68!2m2!1sset!2sRoadmap!4e2!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m2!1e3!5f2!23i47083502&amp;key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes&amp;token=105015"
                                            style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                    </div>
                                    <div
                                        style="position: absolute; left: -768px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear;">
                                        <img draggable="false" alt="" role="presentation"
                                            src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i11!2i600!3i770!4i256!2m3!1e0!2sm!3i728485745!2m3!1e2!6m1!3e5!3m18!2svi-VN!3sUS!5e18!12m5!1e68!2m2!1sset!2sRoadmap!4e2!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m2!1e3!5f2!23i47083502&amp;key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes&amp;token=50729"
                                            style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                    </div>
                                    <div
                                        style="position: absolute; left: -768px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear;">
                                        <img draggable="false" alt="" role="presentation"
                                            src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i11!2i600!3i769!4i256!2m3!1e0!2sm!3i728485745!2m3!1e2!6m1!3e5!3m18!2svi-VN!3sUS!5e18!12m5!1e68!2m2!1sset!2sRoadmap!4e2!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m2!1e3!5f2!23i47083502&amp;key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes&amp;token=10817"
                                            style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                    </div>
                                    <div
                                        style="position: absolute; left: -512px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear;">
                                        <img draggable="false" alt="" role="presentation"
                                            src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i11!2i601!3i769!4i256!2m3!1e0!2sm!3i728485817!2m3!1e2!6m1!3e5!3m18!2svi-VN!3sUS!5e18!12m5!1e68!2m2!1sset!2sRoadmap!4e2!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m2!1e3!5f2!23i47083502&amp;key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes&amp;token=7884"
                                            style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                    </div>
                                    <div
                                        style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear;">
                                        <img draggable="false" alt="" role="presentation"
                                            src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i11!2i602!3i770!4i256!2m3!1e0!2sm!3i728485817!2m3!1e2!6m1!3e5!3m18!2svi-VN!3sUS!5e18!12m5!1e68!2m2!1sset!2sRoadmap!4e2!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m2!1e3!5f2!23i47083502&amp;key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes&amp;token=85454"
                                            style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                    </div>
                                    <div
                                        style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear;">
                                        <img draggable="false" alt="" role="presentation"
                                            src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i11!2i604!3i770!4i256!2m3!1e0!2sm!3i728485817!2m3!1e2!6m1!3e5!3m18!2svi-VN!3sUS!5e18!12m5!1e68!2m2!1sset!2sRoadmap!4e2!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m2!1e3!5f2!23i47083502&amp;key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes&amp;token=29699"
                                            style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                    </div>
                                    <div
                                        style="position: absolute; left: 512px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear;">
                                        <img draggable="false" alt="" role="presentation"
                                            src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i11!2i605!3i769!4i256!2m3!1e0!2sm!3i728485817!2m3!1e2!6m1!3e5!3m18!2svi-VN!3sUS!5e18!12m5!1e68!2m2!1sset!2sRoadmap!4e2!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m2!1e3!5f2!23i47083502&amp;key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes&amp;token=27445"
                                            style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                    </div>
                                    <div
                                        style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear;">
                                        <img draggable="false" alt="" role="presentation"
                                            src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i11!2i604!3i769!4i256!2m3!1e0!2sm!3i728485817!2m3!1e2!6m1!3e5!3m18!2svi-VN!3sUS!5e18!12m5!1e68!2m2!1sset!2sRoadmap!4e2!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m2!1e3!5f2!23i47083502&amp;key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes&amp;token=120858"
                                            style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                    </div>
                                    <div
                                        style="position: absolute; left: 768px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear;">
                                        <img draggable="false" alt="" role="presentation"
                                            src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i11!2i606!3i769!4i256!2m3!1e0!2sm!3i728485817!2m3!1e2!6m1!3e5!3m18!2svi-VN!3sUS!5e18!12m5!1e68!2m2!1sset!2sRoadmap!4e2!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m2!1e3!5f2!23i47083502&amp;key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes&amp;token=65103"
                                            style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                    </div>
                                    <div
                                        style="position: absolute; left: -512px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear;">
                                        <img draggable="false" alt="" role="presentation"
                                            src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i11!2i601!3i770!4i256!2m3!1e0!2sm!3i728485817!2m3!1e2!6m1!3e5!3m18!2svi-VN!3sUS!5e18!12m5!1e68!2m2!1sset!2sRoadmap!4e2!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m2!1e3!5f2!23i47083502&amp;key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes&amp;token=47796"
                                            style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                    </div>
                                    <div
                                        style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear;">
                                        <img draggable="false" alt="" role="presentation"
                                            src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i11!2i602!3i769!4i256!2m3!1e0!2sm!3i728485817!2m3!1e2!6m1!3e5!3m18!2svi-VN!3sUS!5e18!12m5!1e68!2m2!1sset!2sRoadmap!4e2!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m2!1e3!5f2!23i47083502&amp;key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes&amp;token=45542"
                                            style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                    </div>
                                    <div
                                        style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear;">
                                        <img draggable="false" alt="" role="presentation"
                                            src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i11!2i603!3i770!4i256!2m3!1e0!2sm!3i728485817!2m3!1e2!6m1!3e5!3m18!2svi-VN!3sUS!5e18!12m5!1e68!2m2!1sset!2sRoadmap!4e2!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m2!1e3!5f2!23i47083502&amp;key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes&amp;token=123112"
                                            style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                    </div>
                                    <div
                                        style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear;">
                                        <img draggable="false" alt="" role="presentation"
                                            src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i11!2i603!3i769!4i256!2m3!1e0!2sm!3i728485817!2m3!1e2!6m1!3e5!3m18!2svi-VN!3sUS!5e18!12m5!1e68!2m2!1sset!2sRoadmap!4e2!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m2!1e3!5f2!23i47083502&amp;key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes&amp;token=83200"
                                            style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;">
                            <div
                                style="z-index: 4; position: absolute; left: 50%; top: 50%; width: 100%; will-change: transform; transform: translate(0px, 0px);">
                                <div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div>
                                <div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div>
                                <div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;">
                                    <slot></slot><span id="D9FDF81C-D2AB-440D-AC6B-BC6F0E7E3369" style="display: none;">Để
                                        di chuyển giữa các yếu tố tương tác, hãy nhấn các phím mũi tên.</span>
                                    <div title="" role="button" tabindex="0"
                                        aria-describedby="D9FDF81C-D2AB-440D-AC6B-BC6F0E7E3369"
                                        style="width: 60px; height: 74px; overflow: hidden; position: absolute; cursor: pointer; touch-action: none; left: -30px; top: -74px; z-index: 0;">
                                        <img alt="" src="https://maps.gstatic.com/mapfiles/transparent.png"
                                            draggable="false"
                                            style="width: 60px; height: 74px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                    </div>
                                </div>
                                <div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div>
                            </div>
                        </div>
                        <div class="gm-style-moc"
                            style="z-index: 4; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; transition-property: opacity, display; transition-behavior: allow-discrete; opacity: 0; display: none;">
                            <p class="gm-style-mot"></p>
                        </div>
                    </div><iframe aria-hidden="true" frameborder="0" tabindex="-1"
                        style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none; opacity: 0;"></iframe>
                    <div
                        style="pointer-events: none; width: 100%; height: 100%; box-sizing: border-box; position: absolute; z-index: 1000002; opacity: 0; border: 2px solid rgb(26, 115, 232);">
                    </div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div><button draggable="false" aria-label="Chuyển đổi chế độ xem toàn màn hình"
                            title="Chuyển đổi chế độ xem toàn màn hình" type="button" aria-pressed="false"
                            class="gm-control-active gm-fullscreen-control"
                            style="background: none rgb(255, 255, 255); border: 0px; margin: 10px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; border-radius: 2px; height: 40px; width: 40px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; overflow: hidden; top: 0px; right: 0px;"><img
                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E"
                                alt="" style="height: 18px; width: 18px;"><img
                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E"
                                alt="" style="height: 18px; width: 18px;"><img
                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E"
                                alt="" style="height: 18px; width: 18px;"></button></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div>
                        <div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false"
                            data-control-width="40" data-control-height="72"
                            style="margin: 10px; user-select: none; position: absolute; bottom: 86px; right: 40px;">
                            <div class="gmnoprint" data-control-width="40" data-control-height="40"
                                style="display: none; position: absolute;">
                                <div
                                    style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; width: 40px; height: 40px;">
                                    <button draggable="false" aria-label="Xoay bản đồ theo chiều kim đồng hồ"
                                        title="Xoay bản đồ theo chiều kim đồng hồ" type="button"
                                        class="gm-control-active"
                                        style="background: none; display: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; left: 0px; top: 0px; overflow: hidden; width: 40px; height: 40px;"><img
                                            alt=""
                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E"
                                            style="width: 20px; height: 20px;"><img alt=""
                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E"
                                            style="width: 20px; height: 20px;"><img alt=""
                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E"
                                            style="width: 20px; height: 20px;"></button>
                                    <div
                                        style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); display: none;">
                                    </div><button draggable="false" aria-label="Xoay bản đồ ngược chiều kim đồng hồ"
                                        title="Xoay bản đồ ngược chiều kim đồng hồ" type="button"
                                        class="gm-control-active"
                                        style="background: none; display: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; left: 0px; top: 0px; overflow: hidden; width: 40px; height: 40px; transform: scaleX(-1);"><img
                                            alt=""
                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E"
                                            style="width: 20px; height: 20px;"><img alt=""
                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E"
                                            style="width: 20px; height: 20px;"><img alt=""
                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E"
                                            style="width: 20px; height: 20px;"></button>
                                    <div
                                        style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); display: none;">
                                    </div><button draggable="false" aria-label="Nghiêng bản đồ" title="Nghiêng bản đồ"
                                        type="button" class="gm-tilt gm-control-active"
                                        style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; top: 0px; left: 0px; overflow: hidden; width: 40px; height: 40px;"><img
                                            alt=""
                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2016%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2016h8V9H0v7zm10%200h8V9h-8v7zM0%207h8V0H0v7zm10-7v7h8V0h-8z%22/%3E%3C/svg%3E"
                                            style="width: 18px;"><img alt=""
                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2016%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2016h8V9H0v7zm10%200h8V9h-8v7zM0%207h8V0H0v7zm10-7v7h8V0h-8z%22/%3E%3C/svg%3E"
                                            style="width: 18px;"><img alt=""
                                            src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2016%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2016h8V9H0v7zm10%200h8V9h-8v7zM0%207h8V0H0v7zm10-7v7h8V0h-8z%22/%3E%3C/svg%3E"
                                            style="width: 18px;"></button>
                                </div>
                            </div><gmp-internal-camera-control data-control-width="40" data-control-height="40"
                                draggable="false" class="gmnoprint"
                                style="position: absolute; cursor: pointer; user-select: none; left: 0px; top: 0px;"><button
                                    draggable="false" aria-label="Các chế độ điều khiển camera trên bản đồ"
                                    title="Các chế độ điều khiển camera trên bản đồ" type="button"
                                    class="gm-control-active" aria-expanded="false"
                                    aria-controls="38C7CF84-D1E3-4FE5-8E64-D84352438F58"
                                    style="background: none 6px center / 28px no-repeat rgb(255, 255, 255); display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; width: 40px; height: 40px; border-radius: 50%; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px;"><img
                                        src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M12%2019.175l2.125-2.125%201.425%201.4L12%2022l-3.55-3.55%201.425-1.4L12%2019.175zM4.825%2012l2.125%202.125-1.4%201.425L2%2012l3.55-3.55%201.4%201.425L4.825%2012zm14.35%200L17.05%209.875l1.4-1.425L22%2012l-3.55%203.55-1.4-1.425L19.175%2012zM12%204.825L9.875%206.95%208.45%205.55%2012%202l3.55%203.55-1.425%201.4L12%204.825z%22%20fill%3D%22%23666%22/%3E%3C/svg%3E"
                                        alt="" style="height: 28px; width: 28px;"><img
                                        src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M12%2019.175l2.125-2.125%201.425%201.4L12%2022l-3.55-3.55%201.425-1.4L12%2019.175zM4.825%2012l2.125%202.125-1.4%201.425L2%2012l3.55-3.55%201.4%201.425L4.825%2012zm14.35%200L17.05%209.875l1.4-1.425L22%2012l-3.55%203.55-1.4-1.425L19.175%2012zM12%204.825L9.875%206.95%208.45%205.55%2012%202l3.55%203.55-1.425%201.4L12%204.825z%22%20fill%3D%22%23666%22/%3E%3C/svg%3E"
                                        alt="" style="height: 28px; width: 28px;"><img
                                        src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M12%2019.175l2.125-2.125L15.55%2018.45%2012%2022%208.45%2018.45%209.875%2017.05%2012%2019.175zM4.825%2012l2.125%202.125L5.55%2015.55%202%2012%205.55%208.45%206.95%209.875%204.825%2012zM19.175%2012L17.05%209.875%2018.45%208.45%2022%2012%2018.45%2015.55%2017.05%2014.125%2019.175%2012zM12%204.825L9.875%206.95%208.45%205.55%2012%202%2015.55%205.55%2014.125%206.95%2012%204.825z%22%20fill%3D%22%231A73E8%22/%3E%3C/svg%3E"
                                        alt="" style="height: 28px; width: 28px;"><img
                                        src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M12%2019.175l2.125-2.125L15.55%2018.45%2012%2022%208.45%2018.45%209.875%2017.05%2012%2019.175zM4.825%2012l2.125%202.125L5.55%2015.55%202%2012%205.55%208.45%206.95%209.875%204.825%2012zM19.175%2012L17.05%209.875%2018.45%208.45%2022%2012%2018.45%2015.55%2017.05%2014.125%2019.175%2012zM12%204.825L9.875%206.95%208.45%205.55%2012%202%2015.55%205.55%2014.125%206.95%2012%204.825z%22%20fill%3D%22%23D1D1D1%22/%3E%3C/svg%3E"
                                        alt="" style="height: 28px; width: 28px;"></button>
                                <menu id="38C7CF84-D1E3-4FE5-8E64-D84352438F58"
                                    style="list-style: none; padding: 0px; display: none; position: absolute; z-index: 999999; margin: 10px; width: 140px; height: 140px; right: 100%; bottom: -10px;">
                                    <li><button draggable="false" aria-label="Di chuyển lên" title="Di chuyển lên"
                                            type="button" class="gm-control-active"
                                            style="background: none 6px center / 28px no-repeat rgb(255, 255, 255); display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; width: 40px; height: 40px; border-radius: 50%; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; top: 0px; left: 50%; transform: translateX(-50%);"><img
                                                src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M12%2010.8l-4.6%204.6L6%2014l6-6%206%206-1.4%201.4-4.6-4.6z%22%20fill%3D%22%23666%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"><img
                                                src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M12%2010.8l-4.6%204.6L6%2014l6-6%206%206L16.6%2015.4%2012%2010.8z%22%20fill%3D%22%23333%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"><img
                                                src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M12%2010.8l-4.6%204.6L6%2014l6-6%206%206-1.4%201.4-4.6-4.6z%22%20fill%3D%22%23666%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"><img
                                                src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M12%2010.8l-4.6%204.6L6%2014l6-6%206%206L16.6%2015.4%2012%2010.8z%22%20fill%3D%22%23D1D1D1%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"></button></li>
                                    <li><button draggable="false" aria-label="Di chuyển sang trái"
                                            title="Di chuyển sang trái" type="button" class="gm-control-active"
                                            style="background: none 6px center / 28px no-repeat rgb(255, 255, 255); display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; width: 40px; height: 40px; border-radius: 50%; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; bottom: 50%; left: 0px; transform: translateY(50%);"><img
                                                src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M14%2018l-6-6%206-6%201.4%201.4-4.6%204.6%204.6%204.6L14%2018z%22%20fill%3D%22%23666%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"><img
                                                src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M14%2018l-6-6%206-6L15.4%207.4%2010.8%2012%2015.4%2016.6%2014%2018z%22%20fill%3D%22%23333%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"><img
                                                src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M14%2018l-6-6%206-6%201.4%201.4-4.6%204.6%204.6%204.6L14%2018z%22%20fill%3D%22%23666%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"><img
                                                src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M14%2018l-6-6%206-6L15.4%207.4%2010.8%2012%2015.4%2016.6%2014%2018z%22%20fill%3D%22%23D1D1D1%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"></button></li>
                                    <li><button draggable="false" aria-label="Di chuyển sang phải"
                                            title="Di chuyển sang phải" type="button" class="gm-control-active"
                                            style="background: none 6px center / 28px no-repeat rgb(255, 255, 255); display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; width: 40px; height: 40px; border-radius: 50%; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; bottom: 50%; right: 0px; transform: translateY(50%);"><img
                                                src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M12.6%2012L8%207.4%209.4%206l6%206-6%206L8%2016.6l4.6-4.6z%22%20fill%3D%22%23666%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"><img
                                                src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M12.6%2012L8%207.4%209.4%206l6%206-6%206L8%2016.6%2012.6%2012z%22%20fill%3D%22%23333%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"><img
                                                src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M12.6%2012L8%207.4%209.4%206l6%206-6%206L8%2016.6l4.6-4.6z%22%20fill%3D%22%23666%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"><img
                                                src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M12.6%2012L8%207.4%209.4%206l6%206-6%206L8%2016.6%2012.6%2012z%22%20fill%3D%22%23D1D1D1%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"></button></li>
                                    <li><button draggable="false" aria-label="Di chuyển xuống" title="Di chuyển xuống"
                                            type="button" class="gm-control-active"
                                            style="background: none 6px center / 28px no-repeat rgb(255, 255, 255); display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; width: 40px; height: 40px; border-radius: 50%; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; bottom: 0px; left: 50%; transform: translateX(-50%);"><img
                                                src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M12%2015.4l-6-6L7.4%208l4.6%204.6L16.6%208%2018%209.4l-6%206z%22%20fill%3D%22%23666%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"><img
                                                src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M12%2015.4l-6-6L7.4%208l4.6%204.6L16.6%208%2018%209.4l-6%206z%22%20fill%3D%22%23333%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"><img
                                                src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M12%2015.4l-6-6L7.4%208l4.6%204.6L16.6%208%2018%209.4l-6%206z%22%20fill%3D%22%23666%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"><img
                                                src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M12%2015.4l-6-6L7.4%208l4.6%204.6L16.6%208%2018%209.4l-6%206z%22%20fill%3D%22%23666%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"></button></li>
                                    <li><button draggable="false" aria-label="Phóng to" title="Phóng to" type="button"
                                            class="gm-control-active"
                                            style="background: none 6px center / 28px no-repeat rgb(255, 255, 255); display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; border-radius: 50%; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; top: 0px; right: 0px;"><img
                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%20-960%20960%20960%22%20fill%3D%22%23666%22%3E%3Cpath%20d%3D%22M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240z%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"><img
                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%20-960%20960%20960%22%20fill%3D%22%23333%22%3E%3Cpath%20d%3D%22M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240z%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"><img
                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%20-960%20960%20960%22%20fill%3D%22%23111%22%3E%3Cpath%20d%3D%22M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240z%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"><img
                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%20-960%20960%20960%22%20fill%3D%22%23d1d1d1%22%3E%3Cpath%20d%3D%22M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240z%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"></button></li>
                                    <li><button draggable="false" aria-label="Thu nhỏ" title="Thu nhỏ" type="button"
                                            class="gm-control-active"
                                            style="background: none 6px center / 28px no-repeat rgb(255, 255, 255); display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; border-radius: 50%; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; bottom: 0px; right: 0px;"><img
                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%20-960%20960%20960%22%20fill%3D%22%23666%22%3E%3Cpath%20d%3D%22M200-440v-80h560v80H200z%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"><img
                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%20-960%20960%20960%22%20fill%3D%22%23333%22%3E%3Cpath%20d%3D%22M200-440v-80h560v80H200z%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"><img
                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%20-960%20960%20960%22%20fill%3D%22%23111%22%3E%3Cpath%20d%3D%22M200-440v-80h560v80H200z%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"><img
                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%20-960%20960%20960%22%20fill%3D%22%23d1d1d1%22%3E%3Cpath%20d%3D%22M200-440v-80h560v80H200z%22/%3E%3C/svg%3E"
                                                alt="" style="height: 28px; width: 28px;"></button></li>
                                </menu>
                            </gmp-internal-camera-control><button draggable="false"
                                aria-label="Kéo Người hình mắc áo vào bản đồ để mở Chế độ xem phố"
                                title="Kéo Người hình mắc áo vào bản đồ để mở Chế độ xem phố" type="button"
                                style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; left: 20px; top: 72px;"></button>
                        </div>
                    </div>
                    <div>
                        <div style="margin: 0px 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a
                                target="_blank" rel="noopener" title="Mở khu vực này trong Google Maps (mở cửa sổ mới)"
                                aria-label="Mở khu vực này trong Google Maps (mở cửa sổ mới)"
                                href="https://maps.google.com/maps?ll=40.691446,-73.886787&amp;z=11&amp;t=m&amp;hl=vi-VN&amp;gl=US&amp;mapclient=apiv3"
                                style="display: inline;">
                                <div style="width: 66px; height: 26px;"><img alt="Google"
                                        src="data:image/svg+xml,%3Csvg%20fill%3D%22none%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2069%2029%22%3E%3Cg%20opacity%3D%22.3%22%20fill%3D%22%23000%22%20stroke%3D%22%23000%22%20stroke-width%3D%221.5%22%3E%3Cpath%20d%3D%22M17.4706%207.33616L18.0118%206.79504%2017.4599%206.26493C16.0963%204.95519%2014.2582%203.94522%2011.7008%203.94522c-4.613699999999999%200-8.50262%203.7551699999999997-8.50262%208.395779999999998C3.19818%2016.9817%207.0871%2020.7368%2011.7008%2020.7368%2014.1712%2020.7368%2016.0773%2019.918%2017.574%2018.3689%2019.1435%2016.796%2019.5956%2014.6326%2019.5956%2012.957%2019.5956%2012.4338%2019.5516%2011.9316%2019.4661%2011.5041L19.3455%2010.9012H10.9508V14.4954H15.7809C15.6085%2015.092%2015.3488%2015.524%2015.0318%2015.8415%2014.403%2016.4629%2013.4495%2017.1509%2011.7008%2017.1509%209.04835%2017.1509%206.96482%2015.0197%206.96482%2012.341%206.96482%209.66239%209.04835%207.53119%2011.7008%207.53119%2013.137%207.53119%2014.176%208.09189%2014.9578%208.82348L15.4876%209.31922%2016.0006%208.80619%2017.4706%207.33616z%22/%3E%3Cpath%20d%3D%22M24.8656%2020.7286C27.9546%2020.7286%2030.4692%2018.3094%2030.4692%2015.0594%2030.4692%2011.7913%2027.953%209.39009%2024.8656%209.39009%2021.7783%209.39009%2019.2621%2011.7913%2019.2621%2015.0594c0%203.25%202.514499999999998%205.6692%205.6035%205.6692zM24.8656%2012.8282C25.8796%2012.8282%2026.8422%2013.6652%2026.8422%2015.0594%2026.8422%2016.4399%2025.8769%2017.2905%2024.8656%2017.2905%2023.8557%2017.2905%2022.8891%2016.4331%2022.8891%2015.0594%2022.8891%2013.672%2023.853%2012.8282%2024.8656%2012.8282z%22/%3E%3Cpath%20d%3D%22M35.7511%2017.2905v0H35.7469C34.737%2017.2905%2033.7703%2016.4331%2033.7703%2015.0594%2033.7703%2013.672%2034.7343%2012.8282%2035.7469%2012.8282%2036.7608%2012.8282%2037.7234%2013.6652%2037.7234%2015.0594%2037.7234%2016.4439%2036.7554%2017.2961%2035.7511%2017.2905zM35.7387%2020.7286C38.8277%2020.7286%2041.3422%2018.3094%2041.3422%2015.0594%2041.3422%2011.7913%2038.826%209.39009%2035.7387%209.39009%2032.6513%209.39009%2030.1351%2011.7913%2030.1351%2015.0594%2030.1351%2018.3102%2032.6587%2020.7286%2035.7387%2020.7286z%22/%3E%3Cpath%20d%3D%22M51.953%2010.4357V9.68573H48.3999V9.80826C47.8499%209.54648%2047.1977%209.38187%2046.4808%209.38187%2043.5971%209.38187%2041.0168%2011.8998%2041.0168%2015.0758%2041.0168%2017.2027%2042.1808%2019.0237%2043.8201%2019.9895L43.7543%2020.0168%2041.8737%2020.797%2041.1808%2021.0844%2041.4684%2021.7772C42.0912%2023.2776%2043.746%2025.1469%2046.5219%2025.1469%2047.9324%2025.1469%2049.3089%2024.7324%2050.3359%2023.7376%2051.3691%2022.7367%2051.953%2021.2411%2051.953%2019.2723v-8.8366zm-7.2194%209.9844L44.7334%2020.4196C45.2886%2020.6201%2045.878%2020.7286%2046.4808%2020.7286%2047.1616%2020.7286%2047.7866%2020.5819%2048.3218%2020.3395%2048.2342%2020.7286%2048.0801%2021.0105%2047.8966%2021.2077%2047.6154%2021.5099%2047.1764%2021.7088%2046.5219%2021.7088%2045.61%2021.7088%2045.0018%2021.0612%2044.7336%2020.4201zM46.6697%2012.8282C47.6419%2012.8282%2048.5477%2013.6765%2048.5477%2015.084%2048.5477%2016.4636%2047.6521%2017.2987%2046.6697%2017.2987%2045.6269%2017.2987%2044.6767%2016.4249%2044.6767%2015.084%2044.6767%2013.7086%2045.6362%2012.8282%2046.6697%2012.8282zM55.7387%205.22081v-.75H52.0788V20.4412H55.7387V5.22081z%22/%3E%3Cpath%20d%3D%22M63.9128%2016.0614L63.2945%2015.6492%2062.8766%2016.2637C62.4204%2016.9346%2061.8664%2017.3069%2061.0741%2017.3069%2060.6435%2017.3069%2060.3146%2017.2088%2060.0544%2017.0447%2059.9844%2017.0006%2059.9161%2016.9496%2059.8498%2016.8911L65.5497%2014.5286%2066.2322%2014.2456%2065.9596%2013.5589%2065.7406%2013.0075C65.2878%2011.8%2063.8507%209.39832%2060.8278%209.39832%2057.8445%209.39832%2055.5034%2011.7619%2055.5034%2015.0676%2055.5034%2018.2151%2057.8256%2020.7369%2061.0659%2020.7369%2063.6702%2020.7369%2065.177%2019.1378%2065.7942%2018.2213L66.2152%2017.5963%2065.5882%2017.1783%2063.9128%2016.0614zM61.3461%2012.8511L59.4108%2013.6526C59.7903%2013.0783%2060.4215%2012.7954%2060.9017%2012.7954%2061.067%2012.7954%2061.2153%2012.8161%2061.3461%2012.8511z%22/%3E%3C/g%3E%3Cpath%20d%3D%22M11.7008%2019.9868C7.48776%2019.9868%203.94818%2016.554%203.94818%2012.341%203.94818%208.12803%207.48776%204.69522%2011.7008%204.69522%2014.0331%204.69522%2015.692%205.60681%2016.9403%206.80583L15.4703%208.27586C14.5751%207.43819%2013.3597%206.78119%2011.7008%206.78119%208.62108%206.78119%206.21482%209.26135%206.21482%2012.341%206.21482%2015.4207%208.62108%2017.9009%2011.7008%2017.9009%2013.6964%2017.9009%2014.8297%2017.0961%2015.5606%2016.3734%2016.1601%2015.7738%2016.5461%2014.9197%2016.6939%2013.7454h-4.9931V11.6512h7.0298C18.8045%2012.0207%2018.8456%2012.4724%2018.8456%2012.957%2018.8456%2014.5255%2018.4186%2016.4637%2017.0389%2017.8434%2015.692%2019.2395%2013.9838%2019.9868%2011.7008%2019.9868zM29.7192%2015.0594C29.7192%2017.8927%2027.5429%2019.9786%2024.8656%2019.9786%2022.1884%2019.9786%2020.0121%2017.8927%2020.0121%2015.0594%2020.0121%2012.2096%2022.1884%2010.1401%2024.8656%2010.1401%2027.5429%2010.1401%2029.7192%2012.2096%2029.7192%2015.0594zM27.5922%2015.0594C27.5922%2013.2855%2026.3274%2012.0782%2024.8656%2012.0782S22.1391%2013.2937%2022.1391%2015.0594C22.1391%2016.8086%2023.4038%2018.0405%2024.8656%2018.0405S27.5922%2016.8168%2027.5922%2015.0594zM40.5922%2015.0594C40.5922%2017.8927%2038.4159%2019.9786%2035.7387%2019.9786%2033.0696%2019.9786%2030.8851%2017.8927%2030.8851%2015.0594%2030.8851%2012.2096%2033.0614%2010.1401%2035.7387%2010.1401%2038.4159%2010.1401%2040.5922%2012.2096%2040.5922%2015.0594zM38.4734%2015.0594C38.4734%2013.2855%2037.2087%2012.0782%2035.7469%2012.0782%2034.2851%2012.0782%2033.0203%2013.2937%2033.0203%2015.0594%2033.0203%2016.8086%2034.2851%2018.0405%2035.7469%2018.0405%2037.2087%2018.0487%2038.4734%2016.8168%2038.4734%2015.0594zM51.203%2010.4357v8.8366C51.203%2022.9105%2049.0595%2024.3969%2046.5219%2024.3969%2044.132%2024.3969%2042.7031%2022.7955%2042.161%2021.4897L44.0417%2020.7095C44.3784%2021.5143%2045.1997%2022.4588%2046.5219%2022.4588%2048.1479%2022.4588%2049.1499%2021.4487%2049.1499%2019.568V18.8617H49.0759C48.5914%2019.4612%2047.6552%2019.9786%2046.4808%2019.9786%2044.0171%2019.9786%2041.7668%2017.8352%2041.7668%2015.0758%2041.7668%2012.3%2044.0253%2010.1319%2046.4808%2010.1319%2047.6552%2010.1319%2048.5914%2010.6575%2049.0759%2011.2323H49.1499V10.4357H51.203zM49.2977%2015.084C49.2977%2013.3512%2048.1397%2012.0782%2046.6697%2012.0782%2045.175%2012.0782%2043.9267%2013.3429%2043.9267%2015.084%2043.9267%2016.8004%2045.175%2018.0487%2046.6697%2018.0487%2048.1397%2018.0487%2049.2977%2016.8004%2049.2977%2015.084zM54.9887%205.22081V19.6912H52.8288V5.22081H54.9887zM63.4968%2016.6854L65.1722%2017.8023C64.6301%2018.6072%2063.3244%2019.9869%2061.0659%2019.9869%2058.2655%2019.9869%2056.2534%2017.827%2056.2534%2015.0676%2056.2534%2012.1439%2058.2901%2010.1483%2060.8278%2010.1483%2063.3818%2010.1483%2064.6301%2012.1768%2065.0408%2013.2773L65.2625%2013.8357%2058.6843%2016.5623C59.1853%2017.5478%2059.9737%2018.0569%2061.0741%2018.0569%2062.1746%2018.0569%2062.9384%2017.5067%2063.4968%2016.6854zM58.3312%2014.9115L62.7331%2013.0884C62.4867%2012.4724%2061.764%2012.0454%2060.9017%2012.0454%2059.8012%2012.0454%2058.2737%2013.0145%2058.3312%2014.9115z%22%20fill%3D%22%23fff%22/%3E%3C/svg%3E"
                                        draggable="false"
                                        style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;">
                                </div>
                            </a></div>
                    </div>
                    <div></div>
                    <div>
                        <div style="display: inline-flex; position: absolute; right: 0px; bottom: 0px;">
                            <div class="gmnoprint" style="z-index: 1000001;">
                                <div draggable="false" class="gm-style-cc"
                                    style="user-select: none; position: relative; height: 14px; line-height: 14px;">
                                    <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                        <div style="width: 1px;"></div>
                                        <div
                                            style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
                                        </div>
                                    </div>
                                    <div
                                        style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                        <button draggable="false" aria-label="Phím tắt" title="Phím tắt" type="button"
                                            style="background: none; display: inline-block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; color: rgb(0, 0, 0); font-family: inherit; line-height: inherit;">Phím
                                            tắt</button></div>
                                </div>
                            </div>
                            <div class="gmnoprint" style="z-index: 1000001;">
                                <div draggable="false" class="gm-style-cc"
                                    style="user-select: none; position: relative; height: 14px; line-height: 14px;">
                                    <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                        <div style="width: 1px;"></div>
                                        <div
                                            style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
                                        </div>
                                    </div>
                                    <div
                                        style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                        <button draggable="false" aria-label="Dữ liệu Bản đồ" title="Dữ liệu Bản đồ"
                                            type="button"
                                            style="background: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; color: rgb(0, 0, 0); font-family: inherit; line-height: inherit; display: none;">Dữ
                                            liệu Bản đồ</button><span style="">Dữ liệu bản đồ ©2025 Google</span>
                                    </div>
                                </div>
                            </div>
                            <div class="gmnoscreen">
                                <div
                                    style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(0, 0, 0); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">
                                    Dữ liệu bản đồ ©2025 Google</div>
                            </div><button draggable="false" aria-label="Tỷ lệ bản đồ: 2 km/34 pixel"
                                title="Tỷ lệ bản đồ: 2 km/34 pixel" type="button" class="gm-style-cc"
                                aria-describedby="36B29954-33CF-4DA8-AFDC-C3AC4AC8839C"
                                style="background: none; display: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; height: 14px; line-height: 14px;">
                                <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                    <div style="width: 1px;"></div>
                                    <div
                                        style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
                                    </div>
                                </div>
                                <div
                                    style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                    <span style="color: rgb(0, 0, 0);">2 km&nbsp;</span>
                                    <div
                                        style="position: relative; display: inline-block; height: 8px; bottom: -1px; width: 38px;">
                                        <div style="width: 100%; height: 4px; position: absolute; left: 0px; top: 0px;">
                                        </div>
                                        <div style="width: 4px; height: 8px; left: 0px; top: 0px;"></div>
                                        <div style="width: 4px; height: 8px; position: absolute; right: 0px; bottom: 0px;">
                                        </div>
                                        <div
                                            style="position: absolute; background-color: rgb(0, 0, 0); height: 2px; left: 1px; bottom: 1px; right: 1px;">
                                        </div>
                                        <div
                                            style="position: absolute; width: 2px; height: 6px; left: 1px; top: 1px; background-color: rgb(0, 0, 0);">
                                        </div>
                                        <div
                                            style="width: 2px; height: 6px; position: absolute; background-color: rgb(0, 0, 0); bottom: 1px; right: 1px;">
                                        </div>
                                    </div>
                                </div><span id="36B29954-33CF-4DA8-AFDC-C3AC4AC8839C" style="display: none;">Nhấp để
                                    chuyển đổi giữa các đơn vị hệ mét và hệ đo lường Anh</span>
                            </button>
                            <div class="gmnoprint gm-style-cc" draggable="false"
                                style="z-index: 1000001; user-select: none; position: relative; height: 14px; line-height: 14px;">
                                <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                    <div style="width: 1px;"></div>
                                    <div
                                        style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
                                    </div>
                                </div>
                                <div
                                    style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                    <a href="https://www.google.com/intl/vi-VN_US/help/terms_maps.html" target="_blank"
                                        rel="noopener"
                                        style="text-decoration: none; cursor: pointer; color: rgb(0, 0, 0);">Điều khoản</a>
                                </div>
                            </div>
                            <div draggable="false" class="gm-style-cc"
                                style="user-select: none; position: relative; height: 14px; line-height: 14px;">
                                <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                    <div style="width: 1px;"></div>
                                    <div
                                        style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
                                    </div>
                                </div>
                                <div
                                    style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                    <a target="_blank" rel="noopener"
                                        title="Báo cáo lỗi trong bản đồ đường hoặc hình ảnh đến Google" dir="ltr"
                                        href="https://www.google.com/maps/@40.691446,-73.886787,11z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3"
                                        style="font-family: Roboto, Arial, sans-serif; font-size: 10px; text-decoration: none; position: relative; color: rgb(0, 0, 0);">Báo
                                        cáo một lỗi bản đồ</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                style="background-color: white; font-weight: 500; font-family: Roboto, sans-serif; padding: 15px 25px; box-sizing: border-box; top: 5px; border: 1px solid rgba(0, 0, 0, 0.12); border-radius: 5px; left: 50%; max-width: 375px; position: absolute; transform: translateX(-50%); width: calc(100% - 10px); z-index: 1;">
                <div><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/template/images/google_gray.svg"
                        draggable="false"
                        style="padding: 0px; margin: 0px; border: 0px; height: 17px; vertical-align: middle; width: 52px; user-select: none;">
                </div>
                <div style="line-height: 20px; margin: 15px 0px;"><span
                        style="color: rgba(0, 0, 0, 0.87); font-size: 14px;">Trang này không thể tải Google Maps đúng
                        cách.</span></div>
                <table style="width: 100%;">
                    <tr>
                        <td style="line-height: 16px; vertical-align: middle;"><a href="http://g.co/dev/maps-no-account"
                                target="_blank" rel="noopener" style="color: rgba(0, 0, 0, 0.54); font-size: 12px;">Bạn
                                có sở hữu trang web này không?</a></td>
                        <td style="text-align: right;"><button class="dismissButton">OK</button></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
