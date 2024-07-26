document.querySelectorAll('.menu').forEach(button => {
    button.addEventListener('click', function () {
      // Kiểm tra nội dung hiện tại
      var content = this.nextElementSibling;
      var isContentVisible = content.classList.contains('show');

      // Ẩn tất cả menu contents
      document.querySelectorAll('.menu-content').forEach(menu => {
        menu.classList.remove('show');
      });

      // Ẩn tất cả icon xoay về ban đầu
      document.querySelectorAll('.rotate').forEach(icon => {
        icon.classList.remove('rotate-270');
      });

      // Chuyển đổi hiển thị nội dung của menu được click và xoay icon
      if (!isContentVisible) {
        content.classList.add('show');
        this.querySelector('.fa-angle-left').classList.add('rotate-270');
      }
    });
  });
  
  // Đóng menu nếu người dùng click ra ngoài
  window.onclick = function (event) {
    if (!event.target.closest('.menu')) {
      document.querySelectorAll('.menu-content').forEach(menu => {
        menu.classList.remove('show');
      });
      document.querySelectorAll('.rotate').forEach(icon => {
        icon.classList.remove('rotate-270');
      });
    }
  }

