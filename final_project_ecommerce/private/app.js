/* const username = document.querySelector('#username');
const password = document.querySelector('#password');
const usernameError = document.querySelector('#username_error');
const passwordError = document.querySelector('#password_error');
const loginBtn = document.querySelector('#login_btn'); */
const uai = document.querySelector('#user_account_icon');
const logout = document.querySelector('#logout');

//loginBtn.addEventListener("click", errorCheck);
uai.addEventListener("click", popup);

/*function errorCheck(){

    loginBtn.preventDefault();
    
    if(username.value === ""){
        username.placeholder = 'Enter a username';
    }

    if(password.value === ""){
        password.placeholder = 'Enter password';
    }
    

}*/

function popup(){

    if(logout.style.display === "none"){
        logout.style.display = "block" ;
    }else{
        logout.style.display = "none";
    }
}



const hamburger = document.querySelector('#hamburgerbtn');
const menuItems = document.querySelector('#menu_items_ul');
const line1 = document.querySelector('#line1');
const line2 = document.querySelector('#line2');
const line3 = document.querySelector('#line3');

hamburger.addEventListener('click', openMenu);


function openMenu(){
    if(menuItems.style.display === "none"){
        menuItems.style.display = "flex";
        line1.classList.add("line1");
        line2.classList.add("line2");
        line3.classList.add("line3");
    }else{
        menuItems.style.display = "none";
        line1.classList.remove("line1");
        line2.classList.remove("line2");
        line3.classList.remove("line3");
    }


}






