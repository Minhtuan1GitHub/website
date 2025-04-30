const sidebar = document.getElementById("sidebar");
const show_span = document.getElementsByClassName("li-text");
const main = document.getElementById("main");
function toggleSidebar() {
  sidebar.classList.toggle('show');
  // Chuyển HTMLCollection thành mảng để dùng forEach
  Array.from(show_span).forEach(item => {
    item.classList.toggle('show-span');
  });
}