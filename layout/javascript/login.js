const container = document.querySelector('.container');
const signUpBtn = document.querySelector('.signUp-btn');
const signInBtn = document.querySelector('.signIn-btn');

signUpBtn.addEventListener('click',() =>{
  container.classList.add('active');
});

signInBtn.addEventListener('click',() =>{
  container.classList.remove('active');
});