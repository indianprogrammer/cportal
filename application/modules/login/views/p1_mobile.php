<!DOCTYPE html>
<html>
    <head>
        <title>Isp Jet</title>
        <!-- Latest compiled and minified CSS -->

        <style>
            body{
                font-family: 'sans-serif';
            }

            .container{
                /*padding: 10px;*/
                /*background-color: gray;*/
            }

            .hidden{
                display: none;
            }

            .input_box{
                border: none;
                border-bottom: 2px solid gray;
                box-shadow: unset;
                border-radius: unset;
                font-size: 60px;
                height: inherit;
                margin: 5px 0 20px 0;

            }

            .input_box:focus{
                box-shadow: unset;

            }

            .row{
                /*width: 100%;*/
                padding: 5px;
            }

            .logo_screen{
                height: 50vh;
                background-color: #4008af;
            }

            .form_screen{
                height: 50vh;
            }

            .form-card{
                position: relative;
                max-width: 80%;
                height: max-content;
                height: -moz-max-content;
                height: -webkit-max-content;
                height: -o-max-content;
                background-color: white;
                margin: auto;
                margin-top: -8em;
                border-radius: 10px;
                box-shadow: 0px 6px 28px 5px rgba(210, 210, 210, 0.64);
                padding: 10px 20px 80px 20px;

            }

            .form-group label{
                font-size: 40px;
                margin-top: 10px;
                color: #4008af;
            }

            .card-title{
                color: #4008af;
                font-size: 50px;
                width: 100%;
                text-align: center;
                padding: 10px;
                margin: 5px;
            }



            .form_card > .form_input{
                margin: 10px 33px;
                width: 100%;
                padding: 6px;
                border: none;
                border-bottom: 2px solid black;
            }

            .submit-btn{
                position: absolute;
                bottom: -0.8em;
                left: 10%;
                width: 80%;
                padding: 10px 0;
                /*height: 4em;*/
                font-size: 60px;
                font-weight: bold;
                border-radius: 50px;
                background-color: #4008af;
                color: white;
            }

            .submit-btn:focus{
                color: white;
            }

            .input-group {
                position: relative;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-align: stretch;
                align-items: stretch;
                width: 100%;
                margin-bottom: 20px;
            }

            .input-group-addon {
                padding: .375rem .75rem;
                margin-bottom: 0;
                font-size: 60px;
                font-weight: 400;
                line-height: 1.5;
                color: #495057;
                text-align: center;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-align: center;
                align-items: center;
            }

            .input-group .form-control, .input-group-addon, .input-group-btn {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-align: center;
                align-items: center;
            }

            .input-group .form-control {
                position: relative;
                z-index: 2;
                -ms-flex: 1 1 auto;
                flex: 1 1 auto;
                width: 1%;
                margin-bottom: 0;
            }

            .form-control:focus{
                outline: none;
            }
            .animated.flipOutX,
            .animated.flipOutY,
            .animated.bounceIn,
            .animated.bounceOut {
                animation-duration: .75s;
            }

            .animated {
                animation-duration: 1s;
                animation-fill-mode: both;
            }

            @keyframes flipInY {
                from {
                    transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
                    animation-timing-function: ease-in;
                    opacity: 0;
                }

                40% {
                    transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
                    animation-timing-function: ease-in;
                }

                60% {
                    transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
                    opacity: 1;
                }

                80% {
                    transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
                }

                to {
                    transform: perspective(400px);
                }
            }

            .flipInY {
                -webkit-backface-visibility: visible !important;
                backface-visibility: visible !important;
                animation-name: flipInY;
            }


            @keyframes flipOutY {
                from {
                    transform: perspective(400px);
                }

                30% {
                    transform: perspective(400px) rotate3d(0, 1, 0, -15deg);
                    opacity: 1;
                }

                to {
                    transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
                    opacity: 0;
                }
            }

            .flipOutY {
                -webkit-backface-visibility: visible !important;
                backface-visibility: visible !important;
                animation-name: flipOutY;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="mobile_body">
                <div class="row">
                    <div class="logo_screen"></div>
                </div>
                <div class="row">
                    <div class="form_screen">
                        <div class="form-card card1" id="card1">
                            <p class="card-title">LOGIN</p>
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">+91</span>
                                    <input type="text" class="form-control  input_box">
                                </div>
                                <button class="btn submit-btn" id="card1-submit">Submit</button>
                            </div>
                        </div>
                        <div class="form-card card2 hidden" id="card2">
                            <p class="card-title">+91 9329202240</p>
                            <div class="form-group">
                                <label>OTP</label>
                                <div class="input-group">
                                    <input type="text" class="form-control  input_box">
                                </div>
                            </div>

                            <button class="btn submit-btn" id="card2-submit">VERIFY</button>
                        </div>
                        <div class="form-card card3 hidden" id="card3">
                            <p class="card-title">Please Verify</p>
                            <p class="card-title">+91 9329202240</p>
                            <div class="form-group">
                                <label>OTP</label>
                                <div class="input-group">
                                    <input type="text" class="form-control  input_box">
                                </div>
                                <label>Token</label>
                                <div class="input-group">
                                  <!-- <span class="input-group-addon" id="basic-addon1">+91</span> -->
                                    <input type="text" class="form-control  input_box">
                                </div>
                                <button class="btn submit-btn" id="card3-submit">VERIFY</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        document.getElementById("card1-submit").onclick = function () {
            verify_otp()
        };

        function verify_otp() {

            document.getElementById('card1').classList.add("hidden");
            document.getElementById('card3').classList.remove("hidden");
            document.getElementById('card3').classList.add("animated");
            document.getElementById('card3').classList.add("flipInY");
        }

        function loadDoc() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("demo").innerHTML =
                            this.responseText;
                }
            };
            xhttp.open("GET", "ajax_info.txt", true);
            xhttp.send();
        }
    </script>

</html>