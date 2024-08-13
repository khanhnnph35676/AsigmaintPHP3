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

// Function to apply the theme
// Function to apply the theme
function applyTheme(theme) {
    if (theme === 'dark') {
        document.body.style.backgroundColor = 'var(--color-primary)';
        document.querySelector('.main-content').style.backgroundColor = 'var(--color-primary)';
        document.body.style.color = 'var(--color-secondary)';
        document.querySelector('.header').style.backgroundColor = 'rgb(40, 39, 39)';
        document.querySelector('.wrapper-acount').style.color = 'white';
        document.querySelector('#message').style.color = 'white';
        document.querySelector('.fa-lg').style.color = 'var(--color-secondary)';
        document.querySelector('.left-bar').style.backgroundColor = 'rgba(0, 0, 0, 0.543)';
        document.querySelector('.left-bar').style.color = 'var(--color-secondary)';
        document.querySelector('.mes').style.color = 'var(--color-secondary)';
        localStorage.setItem('theme', 'dark');
    } else {
        document.body.style.backgroundColor = 'var(--color-secondary)';
        document.body.style.color = 'black';
        document.querySelector('.main-content').style.backgroundColor = 'var(--color-secondary)';
        document.querySelector('.header').style.backgroundColor = 'rgba(255, 255, 255, 0.8)';
        document.querySelector('.wrapper-acount').style.color = 'black';
        document.querySelector('#message').style.color = 'black';
        document.querySelector('.fa-lg').style.color = 'black';
        document.querySelector('.left-bar').style.backgroundColor = 'rgb(40, 39, 39)';
        document.querySelector('.left-bar').style.color = 'white';
        document.querySelector('.mes').style.color = 'black';
        localStorage.setItem('theme', 'light');
    }
}

// Load theme on page load
document.addEventListener('DOMContentLoaded', function() {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        applyTheme(savedTheme);
    } else {
        applyTheme('light'); // Default to light mode
    }
});

// Event listeners for theme toggle buttons
document.getElementById('dark-mode').addEventListener('click', function(event) {
    event.preventDefault();
    applyTheme('dark');
});

document.getElementById('light-mode').addEventListener('click', function(event) {
    event.preventDefault();
    applyTheme('light');
});


// Load theme on page load
document.addEventListener('DOMContentLoaded', function() {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        applyTheme(savedTheme);
    } else {
        // Default theme
        applyTheme('light');
    }
});

// Event listeners for theme toggle buttons
document.getElementById('dark-mode').addEventListener('click', function(event) {
    event.preventDefault();
    applyTheme('dark');
});

document.getElementById('light-mode').addEventListener('click', function(event) {
    event.preventDefault();
    applyTheme('light');
});


