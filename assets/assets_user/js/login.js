function showpass(){
    const password = document.getElementById("password");
    const showPassword = document.getElementById("showPassword");

    if(showPassword.checked){
        password.type = "text";
        document.getElementById("show").textContent = "Sembunyikan Password";

    }else{
        password.type = "password";
        document.getElementById("show").textContent = "Lihat Password";
    }
}