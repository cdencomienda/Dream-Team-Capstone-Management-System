<!DOCTYPE html>
<html>
<head>
    <title>Capstone Management System</title>
    <style>
        #error-message {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 15px;
            background-color: #ffcccc;
            color: #ff0000;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
            display: none;
        }

        #error-message.show {
            display: block;
        }

        #error-message button {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #ff0000;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="CMS_Style.css">
    <?php include 'login.php'; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script>
        var x, y, z, w, logo;

        window.addEventListener('DOMContentLoaded', (event) => {
            x = document.getElementById("login");
            y = document.getElementById("register");
            z = document.getElementById("btn");
            w = document.getElementById("profile-upload");
            logo = document.getElementById("logo");
        });

        function auth(){
            window.location.assign("HomePage.html");
        }

        function register() {
            // w.style.left = "700px";
            logo.style.visibility = "hidden";
            w.style.visibility = "visible";
            x.style.left = "-488px";
            y.style.left = "212px";
            z.style.left = "110px";
        }

        function login() {
            logo.style.visibility = "visible";
            w.style.visibility = "hidden";
            w.style.left = "700px";
            x.style.left = "212px";
            y.style.left = "750px";
            z.style.left = "0px";
        }

        let profilePic, inputFile;

        window.addEventListener('DOMContentLoaded', (event) => {
            profilePic = document.getElementById("profile-pic");
            inputFile = document.getElementById("input-file");

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
        });
    </script>
    
</head>
<body>
    <div class="hero">
        <div class="form-box">

            <!-- profile picture including upload pic -->
            <form id="profile-upload" class="profile" enctype="multipart/form-data" method="POST" action="register.php">
                
                <div class="profile-card">   
                  
                    <img src="login_assets/profile-img.png" alt="profile image" id="profile-pic">
                    <div id="upload-btn" class="upload-container"></div>
                    <label for="input-file"></label>
                    <input type="file" accept="image/jpeg, image/png, image/jpg" id="input-file" name="profile_picture">
                </div>
            </form> 
            <div class="logoCMS" id="logo"> 
                <img src="login_assets/logoCMS.png" alt="default imamge" id="logo">
            </div>
            <!-- login/signup toggle btn -->
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn"  id="loginButton" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" id="registerButton" onclick="register()">Register</button>
            </div>
 
            <!-- Login/signup info box -->
            <form id="login" class="input-group" action="login.php" method="POST">
                <input type="email" class="input-field" placeholder="Email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required>
                <input type="password" class="input-field" placeholder="Enter Password" name="password" required>
                <button type="submit" class="submit-btn">Log in</button>
            </form>

            <!-- Error message display -->
            <?php if(isset($_SESSION['error_message'])) { ?>
                <div id="error-message" class="show">
                    <?php echo $_SESSION['error_message']; ?>
                    <button onclick="clearErrorMessage()">OK</button>
                </div>
            <?php 
                unset($_SESSION['error_message']); // Clear the error message after displaying it
            } ?>

            <script>
            function clearErrorMessage() {
                var errorMessage = document.getElementById("error-message");
                errorMessage.classList.remove("show");
            }

            </script>
            
            
            <form id="register" class="input-group" action="register.php" method="POST">

                <input type="text" class="input-field" placeholder="Name" name="name" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>" required>
                <input type="email" class="input-field" placeholder="Asia Pacific College Email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required>
                <input type="text" class="input-field" placeholder="Enter ID no." name="idnum" required>
                <input type="password" class="input-field" placeholder="Enter Password" name="password" required>
                <input type="password" class="input-field" placeholder="Confirm Password" name="confirm_password" required>
                <button type="submit" class="submit-btn">Register</button>
                </form>
                            <!-- Error message display -->
            <?php if(isset($_SESSION['error_message'])) { ?>
                <div id="error-message" class="show">
                    <?php echo $_SESSION['error_message']; ?>
                    <button onclick="clearErrorMessage()">OK</button>
                </div>
            <?php 
                unset($_SESSION['error_message']); // Clear the error message after displaying it
            } ?>
            <script>
                const urlParams = new URLSearchParams(window.location.search);
                const registerError = urlParams.get('register_error');
                 if (registerError === 'true') {
                    P_register();
                }
                function P_register() {
                    var x = document.getElementById("login");
                    var y = document.getElementById("register");
                    var z = document.getElementById("btn");
                    var w = document.getElementById("profile-upload");
                    var logo = document.getElementById("logo")
                     // w.style.left = "700px";
                    logo.style.visibility = "hidden"
                    w.style.visibility = "visible";
                    x.style.left = "-488px";
                    y.style.left = "212px";
                    z.style.left = "110px";
            }    
            </script>    
            <script>
            function clearErrorMessage() {
                var errorMessage = document.getElementById("error-message");
                errorMessage.classList.remove("show");
            } 
            </script>        
        </div>
    </div>
  <script src="login.js"></script>    
    
</body>
</html>
