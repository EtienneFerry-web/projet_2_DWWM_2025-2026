const section1 = document.getElementById('user');
const section2 = document.getElementById('addMovie');
const section3 = document.getElementById('report');

const div1 = document.getElementById('listUser');
const div2 = document.getElementById('ficheMovie');
const div3 = document.getElementById('allReport');


section1.addEventListener('click', () => {
  div1.classList.replace("d-none", "d-block");
  div2.classList.replace("d-block", "d-none");
  div3.classList.replace("d-block", "d-none");
});


section2.addEventListener('click', () => {
  div2.classList.replace("d-none", "d-block");
  div1.classList.replace("d-block", "d-none");
  div3.classList.replace("d-block", "d-none");
});


section3.addEventListener('click', () => {
  div3.classList.replace("d-none", "d-block");
  div2.classList.replace("d-block", "d-none");
  div1.classList.replace("d-block", "d-none");
});
