// Language Switcher
const translations = {
    "HRM Giáo Dục": "HRM Education",
    "Trang Chủ": "Home",
    "Tuyển Dụng": "Recruitment",
    "Tin Tức": "News",
    "Đăng Nhập": "Login",
    "Hồ Sơ Ứng Viên": "Candidate Profiles",
    "Quản Lý Nhân Sự": "HR Management",
    "Tính Lương": "Payroll",
    "Dịch Vụ ESS": "ESS Services",
    "Phần Mềm Quản Lý Nhân Sự Giáo Dục": "Education HR Management Software",
    "Giới thiệu": "Introduction",
    "Phần mềm HRM Giáo Dục là giải pháp tối ưu giúp quản lý nhân sự và tuyển dụng trong lĩnh vực giáo dục. Với giao diện thân thiện, tính năng hiện đại, chúng tôi hỗ trợ bạn tiết kiệm thời gian và nâng cao hiệu quả công việc.": "HRM Education software is an optimal solution for managing HR and recruitment in the education sector. With a user-friendly interface and modern features, we help you save time and enhance work efficiency.",
    "Tính năng nổi bật": "Key Features",
    "Quản Lý Tuyển Dụng": "Recruitment Management",
    "Theo dõi tiến trình phỏng vấn, đăng tin tuyển dụng, nhận CV, tự động phản hồi qua email, lưu hồ sơ ứng viên, và lọc ứng viên bằng AI.": "Track interview progress, post job listings, receive CVs, auto-reply via email, store candidate profiles, and filter candidates with AI.",
    "Quản lý thông tin cá nhân, chuyên môn, quan hệ gia đình, khen thưởng, kỷ luật, hợp đồng, và nghỉ phép.": "Manage personal info, expertise, family relations, rewards, discipline, contracts, and leave.",
    "Tính Lương & Phúc Lợi": "Payroll & Benefits",
    "Tự động tính lương dựa trên hợp đồng, phụ cấp, thưởng, khấu trừ thuế và bảo hiểm.": "Auto-calculate salary based on contracts, allowances, bonuses, tax, and insurance deductions.",
    "Dịch Vụ ESS": "ESS Services",
    "Nhân viên xem/sửa thông tin cá nhân, xem phiếu lương, đăng ký nghỉ phép, gửi yêu cầu.": "Employees view/edit personal info, view payslips, request leave, and submit requests.",
    "Đăng Ký Nhận Tin Tuyển Dụng": "Subscribe to Recruitment News",
    "Họ và Tên": "Full Name",
    "Email": "Email",
    "Gửi": "Submit",
    "Phản hồi từ người dùng": "User Feedback",
    "Tin tức mới nhất": "Latest News",
    "Cách tối ưu hóa quy trình tuyển dụng": "How to Optimize Recruitment Process",
    "Tìm hiểu các mẹo để cải thiện hiệu quả tuyển dụng trong giáo dục.": "Learn tips to improve recruitment efficiency in education.",
    "AI trong quản lý nhân sự": "AI in HR Management",
    "Khám phá cách AI thay đổi cách quản lý nhân sự hiện đại.": "Explore how AI transforms modern HR management.",
    "Tăng cường phúc lợi cho giáo viên": "Enhancing Teacher Benefits",
    "Những cách cải thiện phúc lợi để giữ chân nhân tài.": "Ways to improve benefits to retain talent.",
    "Bài viết nổi bật": "Featured Articles",
    "Tầm quan trọng của quản lý nhân sự": "The Importance of HR Management",
    "Hiểu vai trò của HRM trong giáo dục hiện đại.": "Understand the role of HRM in modern education.",
    "Cách sử dụng phần mềm HRM": "How to Use HRM Software",
    "Hướng dẫn cơ bản để bắt đầu với HRM Giáo Dục.": "Basic guide to getting started with HRM Education.",
    "Tối ưu hóa quy trình đào tạo": "Optimize Training Process",
    "Cách nâng cao hiệu quả đào tạo nhân sự giáo dục.": "How to improve the efficiency of training educational staff.",
    "Ứng dụng công nghệ trong HRM": "Applying Technology in HRM",
    "Công nghệ hiện đại hỗ trợ quản lý nhân sự như thế nào.": "How modern technology supports HR management.",
    "Đọc thêm": "Read More",
    "Nhập họ tên": "Enter your name",
    "Nhập email": "Enter your email",
    "“Phần mềm rất dễ sử dụng, giúp tôi tiết kiệm rất nhiều thời gian trong việc quản lý nhân sự.”": "“The software is very easy to use, saving me a lot of time in HR management.”",
    "- Nguyễn Văn A, Quản lý nhân sự": "- Nguyen Van A, HR Manager",
    "“Tính năng lọc ứng viên bằng AI thực sự ấn tượng, chính xác và nhanh chóng!”": "“The AI candidate filtering feature is truly impressive, accurate, and fast!”",
    "- Trần Thị B, Chuyên viên tuyển dụng": "- Tran Thi B, Recruitment Specialist",
    "© 2025 Phần Mềm Quản Lý Nhân Sự Giáo Dục": "© 2025 Education HR Management Software",
    "Thiết kế bởi: [Tên của bạn] | Email: your.email@example.com | SĐT: 0123-456-789": "Designed by: [Your Name] | Email: your.email@example.com | Phone: 0123-456-789"
};

// Đặt ngôn ngữ mặc định khi tải trang
window.onload = () => {
    document.querySelectorAll('[data-lang]').forEach(el => {
        el.textContent = el.getAttribute('data-lang');
    });
    document.querySelectorAll('[data-lang-placeholder]').forEach(el => {
        el.placeholder = el.getAttribute('data-lang-placeholder');
    });
};

// Language Switcher
document.getElementById('langVN').addEventListener('click', () => {
    document.querySelectorAll('[data-lang]').forEach(el => {
        el.textContent = el.getAttribute('data-lang');
    });
    document.querySelectorAll('[data-lang-placeholder]').forEach(el => {
        el.placeholder = el.getAttribute('data-lang-placeholder');
    });
});

document.getElementById('langEN').addEventListener('click', () => {
    document.querySelectorAll('[data-lang]').forEach(el => {
        el.textContent = translations[el.getAttribute('data-lang')] || el.getAttribute('data-lang');
    });
    document.querySelectorAll('[data-lang-placeholder]').forEach(el => {
        el.placeholder = translations[el.getAttribute('data-lang-placeholder')] || el.getAttribute('data-lang-placeholder');
    });
});

// Dark/Light Mode Toggle
const modeToggle = document.getElementById('modeToggle');
modeToggle.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
    const icon = modeToggle.querySelector('i');
    icon.classList.toggle('fa-sun');
    icon.classList.toggle('fa-moon');
});

// Sidebar Toggle
const sidebarToggle = document.getElementById('sidebarToggle');
const sidebar = document.getElementById('sidebar');
sidebarToggle.addEventListener('click', () => {
    sidebar.classList.toggle('active');
});

// Form Submission
const form = document.querySelector('.recruitment-form-container form');
form.addEventListener('submit', (e) => {
    e.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    if (name && email) {
        alert(`Cảm ơn ${name}! Chúng tôi sẽ gửi tin tuyển dụng đến ${email}.`);
        form.reset();
    } else {
        alert('Vui lòng điền đầy đủ thông tin!');
    }
});

// Back to Top Button
const backToTop = document.getElementById('backToTop');
window.addEventListener('scroll', () => {
    if (window.scrollY > 300) {
        backToTop.classList.add('show');
    } else {
        backToTop.classList.remove('show');
    }
});

backToTop.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});