<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang FishNest</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="./thichi.js"></script>
  <link rel="stylesheet" href="./thichi.css">
  <style>
.admin-label {
  position: fixed;
  bottom: 46px;
  right: 50px;
  background: linear-gradient(135deg, #ff9a9e, #fad0c4);
  color: white;
  padding: 15px 22px;
  font-size: 14px;
  font-weight: bold;
  border-radius: 8px;
  z-index: 9999;
  text-decoration: none;
  box-shadow: 0 0 12px rgba(0, 0, 0, 0.2);
  animation: floatHorizontally 3s ease-in-out infinite;
  transition: transform 0.3s ease;
}

.admin-label:hover {
  transform: scale(1.1);
  background: linear-gradient(135deg, #fbc2eb, #a6c1ee);
  box-shadow: 0 0 18px rgba(255, 255, 255, 0.6);
}

@keyframes floatHorizontally {
  0% { right: 50px; }
  50% { right: 150px; }
  100% { right: 50px; }
}


.search-suggestions {
  position: absolute;
  top: 100%;
  left: 0;
  width: 100%;
  background: white;
  border: 1px solid #ccc;
  list-style: none;
  margin-top: 4px;
  padding-left: 0;
  z-index: 999;
  border-radius: 4px;
  max-height: 180px;
  overflow-y: auto;
}
.search-suggestions li {
  padding: 8px 12px;
  cursor: pointer;
}
.search-suggestions li:hover {
  background-color: #f0f0f0;
}

  </style>

</head>

<body>

  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="./trangchu.php">Thế Giới Cá</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#myPage">TRANG CHỦ</a></li>
            <li><a href="#band">CÁ CẢNH</a></li>
            <?php session_start(); ?>
            <?php if (isset($_SESSION['username'])): ?>
              <li><a href="#">🐟 Xin chào, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></a></li>
              <li><a class="dangxuat" href="dangxuat.php">ĐĂNG XUẤT</a></li>
            <?php else: ?>
              <li><a href="#dangnhap">ĐĂNG NHẬP</a></li>
              <li><a href="#dangky">ĐĂNG KÝ</a></li>
            <?php endif; ?>
            <li><a href="./giohang.php">GIỎ HÀNG</a></li>
            <li><a href="#gioithieu">GIỚI THIỆU</a></li>
            <li><a href="#contact">LIÊN HỆ</a></li>
            <li>
              <form class="navbar-form" role="search" action="search.php" method="GET" autocomplete="off">
  <div class="input-group" style="position:relative;">
    <input type="text" class="form-control" placeholder="Tìm kiếm..." name="query" id="search-box" oninput="showSuggestions(this.value)">
    <span class="input-group-btn">
      <button type="submit" class="btn btn-default" style="font-size: 9px;">
        <i class="glyphicon glyphicon-search" style="font-size: 11px;"></i>
      </button>
    </span>
    <ul id="suggestions" class="search-suggestions"></ul>
  </div>
</form>

            </li>

          </ul>
        </div>
      </div>
    </nav>


    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox" style="margin: 49px 0px;">
        <div class="item active">
          <img src="./hinhanh/cá đổi 1.jpg" alt="" class="carousel-img">


        </div>

        <div class="item">
          <img src="./hinhanh/cá đổi 2.jpg" alt="" class="carousel-img">

        </div>

        <div class="item">
          <img src="./hinhanh/cá đổi 3.jpg" alt="" class="carousel-img">

        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <!-- Cá demo -->
    <div id="band" class="container text-center">
      <h3>CÁ CẢNH MỚI 2025</h3>
      <p><em>Chào mừng các bạn đến với shop cá FishNest</em></p>
      <p>🐠 Shop Cá Cảnh FishNest là điểm đến lý tưởng cho những ai đam mê thế giới thủy sinh. Tại đây, bạn sẽ tìm thấy đa dạng loài cá như cá lóc, cá betta, cá Rồng với màu sắc rực rỡ. Đội ngũ nhân viên nhiệt tình sẽ tư vấn cách chăm sóc cá để môi trường sống luôn ổn định. Giá cả hợp lý, dịch vụ tận tâm là điều khiến khách hàng quay lại thường xuyên. AquaDream còn có dịch vụ thiết kế hồ thủy sinh theo yêu cầu và vận chuyển tận nơi. Hãy đến để khám phá không gian xanh mát và mang về những chú cá xinh đẹp tô điểm cho ngôi nhà của bạn. 🌿🐟</p>
      <br>
      <div class="row">
        <div class="col-sm-4">
          <p class="text-center"><strong>Thế giới Cá lóc</strong></p><br>
          <a href="./caloc.php">
            <img src="./hinhanh/cá lốc demo1.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
          </a>
          <div id="demo">
            <p>Thế giới cá lóc</p>
            <p>Hãy nhấp vào để mua hàng</p>
            <p>New 2025</p>
          </div>
        </div>
        <div class="col-sm-4">
          <p class="text-center"><strong>Thế giới cá Betta</strong></p><br>
          <a href="./cabetta.php">
            <img src="./hinhanh/cá lốc demo2.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
          </a>
          <div id="demo2">
            <p>Thế giới cá Betta</p>
            <p>Hãy nhấp vào để mua hàng</p>
            <p>New 2025</p>
          </div>
        </div>
        <div class="col-sm-4">
          <p class="text-center"><strong>Thế giới Cá Rồng</strong></p><br>
          <a href="./carong.php">
            <img src="./hinhanh/cá lốc demo3.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
          </a>
          <div id="demo3">
            <p>Thế giới Cá Rồng</p>
            <p>Hãy nhấp vào để mua hàng</p>
            <p>New 2025</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Đăng Nhập -->
    <div id="dangnhap" class="bg-1">
      <div class="login-box" style="margin: 423px -1px 32px -1pc;">

        <form id="loginForm" action="dangnhap.php" method="POST" style="padding: 23px 11px; margin: 0px 574px;">
          <h3 style="margin: 33px 67px;">Đăng Nhập</h3>
          <div class="form-group">
            <label for="username">Tên đăng nhập</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
          </div>
          <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
          </div>
          <button type="submit" class="btn btn-login btn-block btn-primary">Đăng Nhập</button>
          <div id="errorMsg"></div>
        </form>

      </div>

      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">×</button>
              <h4><span class="glyphicon glyphicon-lock"></span> Tickets</h4>
            </div>
            <div class="modal-body">
              <form role="form">
                <div class="form-group">
                  <label for="psw"><span class="glyphicon glyphicon-shopping-cart"></span> Tickets, $23 per person</label>
                  <input type="number" class="form-control" id="psw" placeholder="How many?">
                </div>
                <div class="form-group">
                  <label for="usrname"><span class="glyphicon glyphicon-user"></span> Send To</label>
                  <input type="text" class="form-control" id="usrname" placeholder="Enter email">
                </div>
                <button type="submit" class="btn btn-block">Pay
                  <span class="glyphicon glyphicon-ok"></span>
                </button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
                <span class="glyphicon glyphicon-remove"></span> Cancel
              </button>
              <p>Need <a href="#">help?</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- (ĐĂNG KÝ) -->
    <div id="dangky" class="bg-1">
      <div class="container">
        <div class="register-box">
          <form id="registerForm" action="dangki.php" method="POST" style="margin: 23px 321px;">
            <h3 style="margin: 34px 108px;">Đăng Ký</h3>
            <div class="form-group">
              <label for="username">Tên đăng nhập</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
            </div>
            <div class="form-group">
              <label for="password">Mật khẩu</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
            </div>
            <div class="form-group">
              <label for="confirmPassword">Nhập lại mật khẩu</label>
              <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Nhập lại mật khẩu" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" required>
            </div>
            <div class="form-group">
              <label for="phone">Số điện thoại</label>
              <input type="tel" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
            </div>
            <div class="form-group">
              <label for="address">Địa chỉ</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ" required>
            </div>
            <button type="submit" class="btn btn-register btn-block btn-success mt-3">Đăng Ký</button>
          </form>

        </div>
      </div>
      <!-- (GIỚI THIỆU ) -->
      <div id="gioithieu" class="bg-1">
        <div class="container1">
          <h3 class="text-center">GIỚI THIỆU</h3>
          <p class="text-center">
            FishNest là cửa hàng trực tuyến chuyên cung cấp các loại cá cảnh và cá giống chất lượng cao, được chọn lọc kỹ lưỡng từ những trang trại uy tín. Với sứ mệnh tạo dựng một cộng đồng yêu thích thủy sinh và đem thiên nhiên gần hơn đến mọi nhà, FishNest cam kết mang đến trải nghiệm mua sắm dễ dàng, dịch vụ tận tâm và thông tin chăm sóc cá phong phú.
          </p>
          <p class="text-center">
            Tại FishNest, bạn có thể tìm thấy đa dạng loài cá độc đáo, từ những chú cá nhỏ nhắn xinh xắn đến những giống quý hiếm đầy màu sắc. Hãy cùng khám phá thế giới dưới nước cùng FishNest và xây dựng một hồ cá đầy sức sống ngay hôm nay!
          </p>


        </div>
      </div>
      <!-- Container (Contact Section) -->
      <div id="contact" class="container">
        <h3 class="text-center">Liên Hệ</h3>
        <p class="text-center"><em>Chào Mừng Các Bạn Đến Với Shop Của Chúng Tôi</em></p>

        <div class="row">
          <div class="col-md-4">
            <p>Bạn Hãy Liên Hệ Tôi</p>
            <p><span class="glyphicon glyphicon-map-marker"></span> Tây Ninh</p>
            <p><span class="glyphicon glyphicon-phone"></span> Phone:0378474760 </p>
            <p><span class="glyphicon glyphicon-envelope"></span> chitt160784@tvu-onschool.edu.vn

            </p>
          </div>
          <form action="submit_feldback.php" method="POST">
            <div class="col-md-8">
              <div class="row">
                <div class="col-sm-6 form-group">
                  <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                </div>
                <div class="col-sm-6 form-group">
                  <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                </div>
              </div>

              <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
              <br>

              <div class="row">
                <div class="col-md-12 form-group">
                  <button class="btn pull-right" type="submit">Send</button>
                </div>
              </div>
            </div>
          </form>

        </div>
        <br>

      </div>


      <!-- Footer -->
      <footer class="text-center">
        <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
          <span class="glyphicon glyphicon-chevron-up"></span>
        </a><br><br>
        <p>Thị Chi Made By </p>
      </footer>
      <?php
      if (isset($_SESSION['username']) && $_SESSION['username'] === 'admin') {
        echo '<a href="admin_kho.php" class="admin-label">👑 Admin</a>';
      }
      ?>
    <script>
const keywords = ['cá rồng', 'ca rong', 'cá betta', 'ca betta', 'cá lóc', 'ca loc'];
const suggestionsBox = document.getElementById('suggestions');
const searchBox = document.getElementById('search-box');

function showSuggestions(value) {
  value = value.toLowerCase().trim();
  suggestionsBox.innerHTML = '';
  if (value.length === 0) return;

  const matches = keywords.filter(k => k.includes(value));
  matches.forEach(k => {
    const li = document.createElement('li');
    li.textContent = k;
    li.onclick = () => {
      searchBox.value = k;
      suggestionsBox.innerHTML = '';
    };
    suggestionsBox.appendChild(li);
  });
}
</script>

  </body>

</html>