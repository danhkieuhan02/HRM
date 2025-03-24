<head>
    <title>Tuyển dụng nhân sự</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/recruitment.css') }}">
</head>

<body>
    {{-- Thanh navbar --}}
    @include('include/adminnav')

    <div class="header">
        Việc làm hấp dẫn
    </div>

    <div class="tabs">
        <a href="#">Ngành nghề thông tin</a>
        <a href="#">Nhân viên bán hàng</a>
        <a href="#">Nhân viên văn phòng</a>
        <a href="#">Marketing</a>
        <a href="#">Vận hành kinh doanh</a>
        <a href="#">Lập trình Front-end</a>
        <a href="#">Lập kế hoạch sản phẩm</a>
        <a href="#">...</a>
    </div>

    <div class="job-list">
        <div class="job-card">
            <span class="tag">Thưởng lương</span>
            <h3>Nhân viên kinh doanh thiết bị...</h3>
            <p>Công ty TNHH công nghệ và thương mại...</p>
            <div class="details">
                <span>1 đến 3 năm</span>
                <span>Cao đẳng</span>
                <span>Tuyển dụng full time</span>
            </div>
            <div class="author">
                <img src="https://via.placeholder.com/30" alt="Avatar">
                <span>Nhân sự - Hoàng Mai Hải Nội</span>
            </div>
        </div>

        <div class="job-card">
            <span class="tag">Thưởng lương</span>
            <h3>Sales công ty TNHH MTV Micro Precision Calibra...</h3>
            <p>Công ty TNHH công nghệ và thương mại...</p>
            <div class="details">
                <span>1 đến 3 năm</span>
                <span>Cao đẳng</span>
                <span>Tuyển dụng full time</span>
            </div>
            <div class="author">
                <img src="https://via.placeholder.com/30" alt="Avatar">
                <span>Nhân sự - Yên Phong Bắc Ninh</span>
            </div>
        </div>

        <div class="job-card">
            <span class="tag">Thưởng lương</span>
            <h3>Nhân viên Sales công ty CP thiết bị điện Phước Thành...</h3>
            <p>Công ty TNHH công nghệ và thương mại...</p>
            <div class="details">
                <span>1 đến 3 năm</span>
                <span>Cao đẳng</span>
                <span>Tuyển dụng full time</span>
            </div>
            <div class="author">
                <img src="https://via.placeholder.com/30" alt="Avatar">
                <span>Nhân sự - Biên Hòa Đồng Nai</span>
            </div>
        </div>
    </div>
</body>
