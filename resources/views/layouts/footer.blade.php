    <footer>
        <div class="container">
          <div class="row">
            <div class="col-md-4 footer-column">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <span class="footer-title">Product</span>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Product 1</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Product 2</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Plans & Prices</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Frequently asked questions</a>
                </li>
              </ul>
            </div>
            <div class="col-md-4 footer-column">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <span class="footer-title">Company</span>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">About us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Job postings</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">News and articles</a>
                </li>
              </ul>
            </div>
            <div class="col-md-4 footer-column">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <span class="footer-title">Contact & Support</span>
                </li>
                <li class="nav-item">
                  <span class="nav-link"><i class="fas fa-phone"></i>+47 45 80 80 80</span>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><i class="fas fa-comments"></i>Live chat</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><i class="fas fa-envelope"></i>Contact us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><i class="fas fa-star"></i>Give feedback</a>
                </li>
              </ul>
            </div>
          </div>
      
          <div class="text-center"><i class="fas fa-ellipsis-h"></i></div>
          
          <div class="row text-center">
            <div class="col-md-4 box">
              <span class="copyright quick-links">Copyright &copy; Your Website <script>document.write(new Date().getFullYear())</script>
              </span>
            </div>
            <div class="col-md-4 box">
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
                </li>
              </ul>
            </div>
            <div class="col-md-4 box">
              <ul class="list-inline quick-links">
                <li class="list-inline-item">
                  <a href="#">Privacy Policy</a>
                </li>
                <li class="list-inline-item">
                  <a href="#">Terms of Use</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      <script>
        $(".nav li a").on("click", function(){
            $(".nav-link").find(".active").removeClass("active");
            $(this).parent().addClass("active");
        });
      </script>
</body>
</html>