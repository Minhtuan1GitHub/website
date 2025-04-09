document.querySelector("form").addEventListener("submit", function (e) {
  var password = document.getElementById("password").value;
  var email = document.getElementById("email").value;
  var confirmpassword = document.getElementById("confirmpassword").value; 
  // var hienpass = document.getElementById("hienpass");
  var kituhoa = /[A-Z]/;
  var kitudacbiet = /[!@#$%^&*(),.?":{}|<>]|[_]/;
  if (email === '') {
    e.preventDefault();
    alert("Bạn phải nhập email");
  }
  else if (password.length < 8) {
    e.preventDefault(); // Ngăn chặn form gửi đi
    alert("Mật khẩu phải có ít nhất 8 ký tự!");
  } else if (password !== confirmpassword) {
    e.preventDefault();
    alert("Mật khẩu không khớp");
  }else if (!kituhoa.test(password)){
    e.preventDefault();
    alert("Mật khẩu phải có ít nhất một kí tự in hoa!");
  }else if(!kitudacbiet.test(password)){
    e.preventDefault();
    alert("Mật khẩu phải có ít nhất một kí tự đặc biệt"); 
  }
});

setTimeout(function(){
  let alertEle = document.getElementById("myAlert");
  if (alertEle){
    alertEle.style.display="none";
  } 
},9000);



var x = true;
var eyeIcon1 = document.getElementById('hienpass');
var eyeIcon2 = document.getElementById('hienpass2');


function nhanvao1(){
  if (x){
    document.getElementById('password').type = "text";
    eyeIcon1.classList.remove('bi-eye-slash');
    eyeIcon1.classList.add('bi-eye');
    x = false;
  } else {
    document.getElementById('password').type = "password";
    eyeIcon1.classList.remove('bi-eye');
    eyeIcon1.classList.add('bi-eye-slash');
    x = true;
  }
}

function nhanvao2(){
  if (x){
    document.getElementById('confirmpassword').type = "text";
    eyeIcon2.classList.remove('bi-eye-slash');
    eyeIcon2.classList.add('bi-eye');
    x = false;
  } else {
    document.getElementById('confirmpassword').type = "password";
    eyeIcon2.classList.remove('bi-eye');
    eyeIcon2.classList.add('bi-eye-slash');
    x = true;
  }
}