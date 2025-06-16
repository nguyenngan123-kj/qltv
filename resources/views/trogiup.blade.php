<!DOCTYPE html>
<html lang="vi">
<head>
  <title>Trợ giúp</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   
</head>
<body>
@include('phandau')

<div class="container">
    <h1 class="mb-4">Bạn Cần Hỗ Trợ? Chúng tôi ở đây để giúp bạn!</h1>

    <div class="accordion mb-5" id="faqAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="faq1Heading">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true">
                    Làm thế nào để đăng ký tài khoản?
                </button>
            </h2>
            <div id="faq1" class="accordion-collapse collapse show" aria-labelledby="faq1Heading" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Bạn nhấn vào nút "Đăng ký", điền thông tin cần thiết và nhấn "Gửi".
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="faq2Heading">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false">
                    Tôi quên mật khẩu, làm sao để lấy lại?
                </button>
            </h2>
            <div id="faq2" class="accordion-collapse collapse" aria-labelledby="faq2Heading" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Nhấp vào "Quên mật khẩu" trên trang đăng nhập và làm theo hướng dẫn.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="faq3Heading">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false">
                    Làm thế nào để liên hệ với bộ phận hỗ trợ?
                </button>
            </h2>
            <div id="faq3" class="accordion-collapse collapse" aria-labelledby="faq3Heading" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Bạn có thể gửi tin nhắn qua biểu mẫu liên hệ phía dưới hoặc email cho chúng tôi.
                </div>
            </div>
        </div>
    </div>

    <h2>Liên Hệ Hỗ Trợ</h2>

   
        <div class="mb-3">
            <label for="name" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ và tên của bạn" value="" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Địa chỉ Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email của bạn" value="" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Nội dung tin nhắn</label>
            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Nội dung cần hỗ trợ" ></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Gửi hỗ trợ</button>
    </form>
</div>
@include('phancuoi')
  <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

