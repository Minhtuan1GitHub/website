<!-- Button trigger modal -->
<div style="display: flex; justify-content: end; margin-bottom: 40px">
  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="border: 1px solid rgb(241, 171, 185); border-radius: 100px; height: 40px; width: 40px; background: rgb(241, 171, 185)">
    <i class="bi bi-robot" style="color: black;"></i>
  </button>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Gửi tin nhắn đến chủ shop</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="messageForm" action="index.php?page=tinnhan" method="post">
          <div>
            <input type="hidden" value="<?=$_SESSION['session_user']['id_user']?>" name="id_user">

            <label for="message" class="form-label">Nhập tin nhắn của bạn</label>
            <textarea class="form-control" id="message" rows="3" placeholder="Nhập tin nhắn của bạn" name="content"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
        <button type="submit" class="btn btn-primary" name="tinnhan"<?php if (!isset($_SESSION['session_user']) || count($_SESSION['session_user']) === 0) echo 'onclick="dangnhap(); return false;"'; ?>>Gửi</button>
        </form>
      </div>
    </div>
  </div>
</div>

<footer class="dk-footer" style="padding-bottom: 1px; width: 100%">
    <div class="contrainer-fluid " style="margin-bottom: 150px; background: white; backdrop-filter: blur(10px);">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 footer-info">
            <div class="dk-footer-box-info p-1 " style="background: rgb(241, 171, 185); backdrop-filter: blur(5px);">
              
              <div class="container d-flex justify-content-center ">
                <a href="#" class="footer-logo">
                  <img src="layout/images/logo/cute.jpg" alt="footer-logo" style="width: 150px;">
                </a>
              </div>

              <div class="container mt-2">
                <p class="footer-info-text" style="max-width: 100%; font-size: 14px; color: black">
                  Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.
                </p>  
              </div>

              <div class="container">
                <div class="footer-social-link">
                  <h3 style="color: black">Follow us</h3>
                  <ul class="d-flex justify-content-evenly p-0" style="list-style: none;">
                    <li>
                      <a href="https://www.facebook.com/ngmitutdtu" target="_blank"><i class="bi bi-facebook fs-5" style="color: blue;"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="bi bi-github fs-5" style="color: black;"></i></a>
                    </li>
                    <li>
                      <a href="https://www.instagram.com/mintuan05/" target="_blank"><i class="bi bi-instagram fs-5" style="color: orange;"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="bi bi-google fs-5" style="color: red"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            
            </div>
          </div>

          <div class="col-lg-9 d-flex flex-column justify-content-evenly">
            <div class="row p-1">
              <div class="col">
                <div class="contact-us d-flex align-items-center g-0 p-0" style="gap: 10px;">
                  <div class="contact-icon mb-4">
                    <i class="bi bi-map fs-2" style="color: rgb(241, 171, 185);"></i>
                  </div>
                  <div class="contact-info">
                    <h3 style="color: black">Ho Chi Minh City</h3>
                    <p style="color: black;">1168/9 Le Van Luong Nha Be</p>
                  </div>
                </div>
              </div>
              
              <div class="col">
                <div class="contact-us d-flex align-items-center g-0 p-0" style="gap: 10px;">
                  <div class="contact-icon mb-4">
                    <i class="bi bi-phone fs-2" style="color: rgb(241, 171, 185);"></i>
                  </div>
                  <div class="contact-info">
                    <h3 style="color: black;">+84 382494117</h3>
                    <p style="color: black;">Give us a call</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="row p-1">
              <div class="col">
                <div class="footer-widget">
                  <div class="section-heading">
                    <h3 style="color: black;">Useful links</h3>
                    <span class="animate-border border-black"></span>
                  </div>
                  <div class="container d-flex" style="gap: 10px; ">
                    <ul>
                      <li>
                        <a href="#" style="color: #b5b5b5">About us</a>
                      </li>
                      <li>
                        <a href="#" style="color: silver;">Services</a>
                      </li>
                      <li>
                        <a href="#" style="color: silver;">Projects</a>
                      </li>
                      <li>
                        <a href="#" style="color: silver;">Our team</a>
                      </li>
                    </ul>
                    <ul>
                      <li>
                        <a href="#" style="color: silver;">Contact us</a>
                      </li>
                      <li>
                        <a href="#" style="color: silver;">Blog</a>
                      </li>
                      <li>
                        <a href="#" style="color: silver;">Testimonial</a>
                      </li>
                      <li>
                        <a href="#" style="color: silver;">Faq</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="footer-widget">
                  <div class="section-heading">
                    <h3 style="color: black;">Location</h3>
                    <span class="animate-border border-black"></span>
                  </div>
                    <div class="row">
                      <div class="col d-flex">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.4342079702456!2d106.71108117506431!3d10.700953589443241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175312ae714e657%3A0x7e6d55af2718175f!2zMTE2OCDEkC4gTMOqIFbEg24gTMawxqFuZywgUGjGsOG7m2MgS2nhu4NuLCBRdeG6rW4gNywgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1743470054415!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                      </div>
                    </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="copyright container-fluid mt-2" style="backdrop-filter: blur(5px);">
        <div class="container" style="background: rgb(241, 171, 185)">
          <div class="row" style="padding-top: 5px; padding-bottom: 5px; ">
            <div class="col d-flex align-items-center">
              <span style="color: #000000;">
                Copyright © 2019, All Right Reserved Seobin
              </span>
            </div>
            <div class="col">
              <div class="copyright-menu">
                <ul class="d-flex align-items-center p-0 m-0 justify-content-end" style="gap: 20px; color: #000000; list-style: none">
                  <li>
                    <a href="#">Home</a>
                  </li>
                  <li>
                    <a href="#">Terms</a>
                  </li>
                  <li>
                    <a href="#">Privacy Policy</a>
                  </li>
                  <li>
                    <a href="#">Contact</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
</footer>


<script>
    document.addEventListener("DOMContentLoaded", function () {
      const form = document.getElementById("messageForm");
      form.addEventListener("submit", function (event) {
        const message = document.getElementById("message").value.trim();
        if (message === "") {
          event.preventDefault(); // Prevent form submission
          alert("Vui lòng nhập tin nhắn của bạn!"); // Show an alert
        }
      });
    });

    function dangnhap(){
    Swal.fire({
      icon: 'info',
      title: 'Bạn chưa truy cập vào tài khoản',
      html: "Nếu chưa có tài khoản nhấn vào <a href='index.php?page=dangnhap' style='text-decoration:none;'><i class='bi bi-person fs-3'></i></a> để đăng kí miễn phí",
      confirmButtonText: 'OK'
    });  
  }
</script>