

function validate(){
    var pass = document.getElementById("pass").value;
    var name = document.getElementById("urn").value;

    
    if(pass=="123"&& name=="abc"){
        
        window.open("movie.html");
        return false;
    }
    else{
        alert("Login Failed");
    }
    

}



function lpage(){
    window.location.replace("Landingpage.html")
}