function showAlert(){
  document.getElementById("myAlert").classList.remove("d-none");
}
function closeAlert(){
  document.getElementById("myAlert").classList.add("d-none");
}

document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".counter").forEach((counter) => {
    let countDisplay = counter.querySelector(".count");
    let increaseBtn = counter.querySelector(".increase");
    let decreaseBtn = counter.querySelector(".decrease");

    // Lấy giá trị ban đầu từ HTML
    let count = parseInt(countDisplay.textContent) || 0;

    increaseBtn.addEventListener("click", () => {
      count++;
      countDisplay.textContent = count;
    });

    decreaseBtn.addEventListener("click", () => {
      if (count > 0) {
        count--;
        countDisplay.textContent = count;
      }
    });
  });
});
