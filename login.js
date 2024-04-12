        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");
        var w = document.getElementById("profile-upload");
        var logo = document.getElementById("logo")
    
        function auth(){
            window.location.assign("HomePage.html")
        }
    
        function register() {
            
            // w.style.left = "700px";
            logo.style.visibility = "hidden"
            w.style.visibility = "visible";
            x.style.left = "-488px";
            y.style.left = "212px";
            z.style.left = "110px";
        }
    
        function login() {
            logo.style.visibility = "visible"
            w.style.visibility ="hidden";
            w.style.left = "700px";
            x.style.left = "212px";
            y.style.left = "750px";
            z.style.left = "0px";
        }
    

        
        let profilePic = document.getElementById("profile-pic");
        let inputFile = document.getElementById("input-file");
    
        inputFile.addEventListener("change", function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e){
                    profilePic.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        const urlParams = new URLSearchParams(window.location.search);
        const registerError = urlParams.get('register_error');
    
        // If register_error parameter is present, call the register() function
        if (registerError === 'true') {
            register();
        }