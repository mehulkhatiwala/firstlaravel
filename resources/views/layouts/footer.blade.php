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
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      <!-- Toastr JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      <script type="text/javascript">
        // $(document).on('click', '.navbar-collapse .navbar-nav .nav-item', function(){
        //   // console.log(this);
        //   $(this).addClass('active').siblings().removeClass('active');  
        //   return false;
        // });
        $(document).ready(function(){
          // $('.alert-success').fadeIn().delay(5000).fadeOut();
          $('.alert-success').slideDown().delay(3000).slideUp('slow');
          $('.alert-warning').slideDown().delay(3000).slideUp('slow');
          $('.alert-danger').slideDown().delay(3000).slideUp('slow');
        });        
      </script>
      @isset($status)
        @if ($status == 'success')
          <script>
            toastr.success("{{ $msg }}");
          </script>
        @elseif ($status == 'failed')
          <script>
            toastr.error("{{ $msg }}");
          </script>
        @elseif ($status == 'warning')
          <script>
            toastr.warning("{{ $msg }}");
          </script>
        @endif
      @endisset
      <script>
        document.addEventListener("DOMContentLoaded", function(){
        // make it as accordion for smaller screens
        if (window.innerWidth < 992) {

          // close all inner dropdowns when parent is closed
          document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
            everydropdown.addEventListener('hidden.bs.dropdown', function () {
              // after dropdown is hidden, then find all submenus
                this.querySelectorAll('.submenu').forEach(function(everysubmenu){
                  // hide every submenu as well
                  everysubmenu.style.display = 'none';
                });
            })
          });

          document.querySelectorAll('.dropdown-menu a').forEach(function(element){
            element.addEventListener('click', function (e) {
                let nextEl = this.nextElementSibling;
                if(nextEl && nextEl.classList.contains('submenu')) {	
                  // prevent opening link if link needs to open dropdown
                  e.preventDefault();
                  if(nextEl.style.display == 'block'){
                    nextEl.style.display = 'none';
                  } else {
                    nextEl.style.display = 'block';
                  }

                }
            });
          })
        }
        // end if innerWidth
        }); 
        // DOMContentLoaded  end

        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
          'use strict'

          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.querySelectorAll('.needs-validation')

          // Loop over them and prevent submission
          Array.prototype.slice.call(forms)
            .forEach(function (form) {
              form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                  event.preventDefault()
                  event.stopPropagation()
                }

                form.classList.add('was-validated')
              }, false)
            })
        })()
      </script>
</body>
</html>