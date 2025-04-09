import '../css/login.css';

<div class="box-signin">
    <div class="box-container-wisdom">
        <div class="ctnr">
            <div class="box-login-wisdom">
                <div class="images-logo">
                    <img src="/storage/setting/1/SDqyaRgTonjZxTCi0lwK.png" alt="logo-login">
                </div>
                <form method="POST" action="https://appkipi.natuh.com.vn/login" aria-label="Login"
                    class="form-login-wisdom" id="loginForm2" autocomplete="false">
                    <input type="hidden" name="_token" value="zULZZ3VuceKdPXxGppWFSLDM90x3hvhIkjfBtJWV">
                    <div class="form-input-wisdom">
                        <div class="input-container">
                            <input type="text" name="identification" id="identification" required=""
                                autocomplete="off">

                            <label for="identification" class="label">Tên đăng nhập</label>
                        </div>
                    </div>
                    <div class="form-input-wisdom pasword">
                        <div class="input-container">
                            <input type="password" id="password" name="password" required="" autocomplete="off">
                            <label for="password" class="label">Mật khẩu</label>
                            <span class="toggle-password" onclick="togglePassword()">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    <div class="text-danger" id="errorLogin2"></div>

                    <div class="ghichu">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Ghi nhớ trạng thái đăng nhập trên thiết bị này</label>
                    </div>

                    <div class="btn-dangnhap">
                        <button type="submit" class="btn-dangnhap-wisdom">
                            ĐĂNG NHẬP
                        </button>
                    </div>

                    <div class="btn-dangky">
                        <a href="https://appkipi.natuh.com.vn/profile/register">
                            ĐĂNG KÝ
                        </a>
                    </div>

                    <div class="quenmk">
                        <a href="https://appkipi.natuh.com.vn/login/forgot-password">
                            QUÊN MẬT KHẨU
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
