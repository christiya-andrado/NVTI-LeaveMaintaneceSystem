<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .popup{
    width: 400px;
    background: #fff;
    border-radius: 6px;
    position: absolute;
    top: 0;
    left: 50%;
    transform: translate(-50%,-50%) scale(0.1);
    text-align: center;
    padding: 0 30px 30px;
    color: #333;
    visibility: hidden;
    transition: transform 0.4s, top 0.4s;

}

.open-popup{
    visibility: visible;
    top: 50%;
    transform: translate(-50%,-50%) scale(1);
}

.popup img{
    margin-top: -50px;
    border-radius: 50%;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

.popup h2{
    font-size: 38px;
    font-weight: 500;
    margin: 30px 0 10px;
}

.popup .button{
    width: 100%;
    margin-top: 50px;
    padding: 10px 0;
    background: #6fd649;
    color: #fff;
    border: 0;
    outline: none;
    font-size: 18px;
    border-radius: 4px;
    cursor: pointer;
    box-shadow: 0 5px 5px rgba(0,0,0,0.2);
}
    </style>
</head>
<body>
  
                            <div class="popup" id="popup">
                            <img src="images1/pop.png" width="200px" height="200px">
                            <h2>Log in</h2><br>
                                
                            <button type="button" onclick="adminpanel()">Admin Panel</button>
                            <button type="button" onclick="userpanel()">User Panel</button>
                            </div>

                            <script>
                            let popup = document.getElementById("popup");
                                
                            function openPopup(){
                            popup.classList.add("open-popup");
                            }

                            function adminpanel(){
                            popup.classList.remove("open-popup");
                            window.location.replace("local/index.php");
                            }

                            function userpanel(){
                            popup.classList.remove("open-popup");
                            window.location.replace("Dashboard.php");
                            }
                            </script>
                        
         
    
</body>
</html>
<?php
?>