document.getElementById("login_btn").addEventListener("click", show_login);
document.getElementById("signup_btn").addEventListener("click", show_signUp);
document.getElementById("modal_cancel_login").addEventListener("click", hide_window);
document.getElementById("modal_cancel_signup").addEventListener("click", hide_window);
document.getElementById("blanket").addEventListener("click", hide_window);

function show_login(){
    document.getElementById("modal_login").style.display = "block";
    document.getElementById("blanket").style.display = "block";
}

function show_signUp(){
    document.getElementById("modal_signup").style.display = "block";
    document.getElementById("blanket").style.display = "block";
}

function hide_window(){
    document.getElementById("modal_login").style.display = "none";   //click cancel button to hide login window
    document.getElementById("modal_signup").style.display = "none"; //click cancel button to hide signup window
    document.getElementById("blanket").style.display = "none";  //click blanket to hide login window
}