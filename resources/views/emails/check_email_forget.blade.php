<style>
.test-email {
    width: 500px;
    margin: 0 auto;
    padding: 15px;
    text-align: center;
}
</style>
<div class="test-email">
    <h2>Hi {{$name}}!</h2>
    <p>Email này giúp bạn lấy lại mật khẩu tài khoản đã bị quên</p>
    <p>Vui lòng click vào link dưới đây để đặt lại mật khẩu</p>
    <p>Chú ý: Mã xác nhận này chỉ có hiệu lực trong vòng 72h</p>
    <p>Mã bảo mật bao gồm 6 số, vui lòng không cung cấp mã bảo mật: {{$securityCode}}</p>
</div>