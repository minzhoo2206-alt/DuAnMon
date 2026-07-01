<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang quản lý</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container-fluid">
      <!-- Logo -->
      <a class="navbar-brand fw-bold" href="index.php?url=home">MyShop</a>

      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
              data-bs-target="#navbarNav" aria-controls="navbarNav" 
              aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="index.php?url=home">🏠 Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?url=dashboard">📊 Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">📞 Liên hệ</a>
          </li>
        </ul>

        <!-- Search box -->
        <form class="d-flex me-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Tìm kiếm..." aria-label="Search">
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form>

        <!-- Icons -->
        <a href="#" class="btn btn-outline-light me-2">
          <i class="bi bi-box-arrow-in-right"></i> Đăng nhập
        </a>
        <a href="#" class="btn btn-outline-light">
          <i class="bi bi-cart3"></i> Giỏ hàng
        </a>
      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</body>
</html>
