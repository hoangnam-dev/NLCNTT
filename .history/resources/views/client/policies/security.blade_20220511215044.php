@extends('client.layouts.master')
@section('title')
{{ $title }}    
@endsection
@section('content')
{{-- <div class="container"> --}}
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center align-items-center" style="height:180px ;background-color: #666666">
            <h1 class="text-white title-font">Chính sách bảo mật</h1>
        </div>
    </div>
    <div class="container mt-1">
        <div class="row">
            <div class="col-md-12">
                <div class="policy-content mt-2">
                    <h2>Bình luận</h2>
                    <p>Khi khách truy cập để lại bình luận trên trang web, chúng tôi thu thập dữ liệu được hiển thị trong biểu mẫu bình luận, cũng như địa chỉ IP của khách truy cập và chuỗi tác nhân người dùng trình duyệt để giúp phát hiện spam.</p>
                    <p>Một chuỗi ẩn danh được tạo từ địa chỉ email của bạn (còn được gọi là mã băm) có thể được cung cấp cho dịch vụ Gravatar để xem bạn có đang sử dụng nó hay không. Chính sách bảo mật của dịch vụ Gravatar có sẵn tại đây: https://automattic.com/privacy/. Sau khi phê duyệt bình luận của bạn, ảnh hồ sơ của bạn sẽ hiển thị công khai trong bối cảnh bình luận của bạn.</p>
                    
                    <h2>Phương tiện truyền thông</h2>
                    <p>Nếu bạn tải hình ảnh lên trang web, bạn nên tránh tải lên hình ảnh có bao gồm dữ liệu vị trí nhúng (EXIF GPS). Khách truy cập trang web có thể tải xuống và trích xuất bất kỳ dữ liệu vị trí nào từ hình ảnh trên trang web.</p>
                    
                    <h2>Cookies</h2>
                    <p>Nếu bạn để lại nhận xét trên trang web của chúng tôi, bạn có thể chọn tham gia lưu tên, địa chỉ email và trang web của bạn trong cookie. Đây là những điều thuận tiện cho bạn để bạn không phải điền lại thông tin chi tiết của mình khi bạn để lại bình luận khác. Những cookie này sẽ tồn tại trong một năm.</p>
                    <p>Nếu bạn truy cập trang đăng nhập của chúng tôi, chúng tôi sẽ đặt một cookie tạm thời để xác định xem trình duyệt của bạn có chấp nhận cookie hay không. Cookie này không chứa dữ liệu cá nhân và sẽ bị loại bỏ khi bạn đóng trình duyệt của mình.</p>
                    <p>Khi bạn đăng nhập, chúng tôi cũng sẽ thiết lập một số cookie để lưu thông tin đăng nhập và các lựa chọn hiển thị trên màn hình của bạn. Cookie đăng nhập tồn tại trong hai ngày và cookie tùy chọn màn hình tồn tại trong một năm. Nếu bạn chọn “Nhớ thông tin đăng nhập”, thông tin đăng nhập của bạn sẽ tồn tại trong hai tuần. Nếu bạn đăng xuất khỏi tài khoản của mình, cookie đăng nhập sẽ bị xóa.</p>
                    <p>Nếu bạn chỉnh sửa hoặc xuất bản một bài báo, một cookie bổ sung sẽ được lưu trong trình duyệt của bạn. Cookie này không bao gồm dữ liệu cá nhân và chỉ cho biết ID bài viết của bài viết bạn vừa chỉnh sửa. Nó sẽ hết hạn sau 1 ngày.</p>
                    
                    <h2>Nội dung được nhúng từ các trang web khác</h2>
                    <p>Các bài viết trên trang web này có thể bao gồm nội dung được nhúng (ví dụ: video, hình ảnh, bài báo, v.v.). Nội dung được nhúng từ các trang web khác hoạt động theo cách giống hệt như khi khách truy cập đã truy cập trang web khác.</p>
                    <p>Các trang web này có thể thu thập dữ liệu về bạn, sử dụng cookie, nhúng theo dõi bên thứ ba bổ sung và giám sát tương tác của bạn với nội dung được nhúng đó, bao gồm theo dõi tương tác của bạn với nội dung được nhúng nếu bạn có tài khoản và đăng nhập vào trang web đó.</p>
                    
                    <h2>Chúng tôi chia sẻ dữ liệu của bạn với ai</h2>
                    <p>Nếu bạn yêu cầu đặt lại mật khẩu, địa chỉ IP của bạn sẽ được bao gồm trong email đặt lại.</p>
                    
                    <h2>Chúng tôi lưu giữ dữ liệu của bạn trong bao lâu</h2>
                    <p>Nếu bạn để lại nhận xét, nhận xét và siêu dữ liệu của nó sẽ được giữ lại vô thời hạn. Điều này là để chúng tôi có thể nhận ra và phê duyệt bất kỳ nhận xét tiếp theo nào một cách tự động thay vì giữ chúng trong hàng đợi kiểm duyệt.</p>
                    <p>Đối với người dùng đăng ký trên trang web của chúng tôi (nếu có), chúng tôi cũng lưu trữ thông tin cá nhân mà họ cung cấp trong hồ sơ người dùng của họ. Tất cả người dùng có thể xem, chỉnh sửa hoặc xóa thông tin cá nhân của họ bất kỳ lúc nào (ngoại trừ họ không thể thay đổi tên người dùng của mình). Người quản trị trang web cũng có thể xem và chỉnh sửa thông tin đó.</p>
                    
                    <h2>Bạn có quyền gì đối với dữ liệu của mình</h2>
                    <p>Nếu bạn có tài khoản trên trang web này hoặc đã để lại nhận xét, bạn có thể yêu cầu nhận tệp đã xuất của dữ liệu cá nhân mà chúng tôi lưu giữ về bạn, bao gồm bất kỳ dữ liệu nào bạn đã cung cấp cho chúng tôi. Bạn cũng có thể yêu cầu chúng tôi xóa mọi dữ liệu cá nhân mà chúng tôi lưu giữ về bạn. Điều này không bao gồm bất kỳ dữ liệu nào mà chúng tôi có nghĩa vụ lưu giữ cho các mục đích quản trị, pháp lý hoặc bảo mật.</p>
                    
                    <h2>Nơi chúng tôi gửi dữ liệu của bạn</h2>
                    <p>Nhận xét của khách truy cập có thể được kiểm tra thông qua dịch vụ phát hiện spam tự động.</p>
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}
@endsection