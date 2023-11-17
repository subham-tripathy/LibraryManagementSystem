const signInbtn = document.getElementsByClassName('signInbtn')[0];
const signUpbtn = document.getElementsByClassName('signUpbtn')[0];

const signInSection = document.getElementsByClassName('signIn')[0];
const signUpSection = document.getElementsByClassName('signUp')[0];





signInbtn.addEventListener('click', ()=>{
    signInSection.style.display = "block";
    signUpSection.style.display = "none";
    signInbtn.classList.add('active');
    signUpbtn.classList.remove('active');
});

signUpbtn.addEventListener('click', ()=>{
    signUpSection.style.display = "block";
    signInSection.style.display = "none";
    signUpbtn.classList.add('active');
    signInbtn.classList.remove('active');
});