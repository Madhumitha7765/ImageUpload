<html>
   <head>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <style>
                            body {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    align-content: center;
                    flex-wrap: wrap;
                    background-color: #56b3a3;
                    }
                                    /* Container needed to position the button. Adjust the width as needed */
                            .container1 {
                            position: relative;
                            width: 50%;
                            }

                            /* Make the image responsive */
                            .container1 img {
                            width: 500px;
                            height: 500px;
                            }

                            /* Style the button and place it in the middle of the container/image */
                            .container1 .vbtn {
                            position: absolute;
                            top: 100%;
                            left: 100%;
                            transform: translate(-50%, -50%);
                            -ms-transform: translate(-50%, -50%);
                            background-color: #555;
                            color: white;
                            font-size: 16px;
                            padding: 12px 24px;
                            border: none;
                            cursor: pointer;
                            border-radius: 5px;
                            }

                            .container1 .vbtn:hover {
                            background-color: black;
                            }
                //locale_get_script
                $red: #881d12;


                @mixin bump {
                0%      {transform: scale(1); }
                50%     {transform: scale(1.5); }
                100%    {transform: scale(1); }
                }

                @keyframes bump1 { @include bump; }
                @keyframes bump2 {@include bump;}

                body {padding:50px; background:#ededed;}

                .vote-count {
                width:40px;
                height:35px;
                text-align:center;
                color:$red;
                font:20px/1.5 georgia;
                margin-bottom:10px;
                animation: bump .3s; 
                &.bumped {
                animation: bump2 .3s; 
                }
                }

                .vote-btn {
                appearance:none;
                border-radius:3px;
                border:0;
                background:#fff;
                padding:15px 12px 15px 40px;
                font:bold 9px/1.2 arial;
                text-transform:uppercase;
                letter-spacing:1px;
                color:$red;
                box-shadow:0 1px 1px rgba(0,0,0,.2);
                outline:none;
                position:relative;
                transition: all .3s ease-out; 
                cursor:pointer;
                overflow:hidden;

                .icon1 {
                position:absolute;
                content: "";
                left:10px;
                top:10px;
                width:20px;
                height:20px;
                border-radius:10px;
                display:inline-block;
                background:$red 2px 1px;
                background-size:16px auto;
                transition: all .3s ease-out; 

                }

                }


                .vote-btn.complete {
                padding-left:15px;
                background:#c1c0bb;
                color: #fff;
                .icon1{
                opacity:0;
                /* transform: rotateX(90deg); */
                transform: scale(0); 
                }
                }         
        </style>
        
        
        <script>
               
                        var VoteWidget= {
                        settings: {
                            $counter: $('.vote-count'),
                            $btn:     $('.myform button'),
                        },
                        init: function() {
                        VoteWidget.bind();
                        },
                        bind: function() {
                            VoteWidget.settings.$btn.click(function(){
                            if (! $(this).hasClass('complete')) {
                                    VoteWidget.bumpCount();
                            }
                            $(this).toggleClass('complete');
                            VoteWidget.toggleText();  

                            return false;
                        });
                        },
                        bumpCount: function() {
                            var current_count = $('.vote-count').text();
                            count = parseInt(current_count);
                            count++;
                            VoteWidget.settings.$counter.toggleClass('bumped').text(count);
                        },
                        toggleText: function(){
                            var $text_container = $('.myform button .text');
                            var alt_text = VoteWidget.settings.$btn.data('alt-text');
                            var default_text = VoteWidget.settings.$btn.data('default-text');
                            var current_text = $text_container.text();
                            console.log('current is ' + current_text);
                            if ( current_text == default_text ) {
                            $text_container.text(alt_text)
                            } else {
                            $text_container.text(default_text)
                            }
                        }
                        }


                        VoteWidget.init();


           

        </script>
        
   </head>


<body>
<div>
<table cellspacing="20px" cellpadding="20px">

                    <?php
                    $con = mysqli_connect('localhost','root');
                    mysqli_select_db($con,'displayupload');

                    if(isset($_POST['submit'])){
                    $username = $_POST['username'];
                    $file1 = $_FILES['file1'];
                    $file2 = $_FILES['file2'];
                    $email =  $_POST['email'];
                    //print_r($username);
                    //echo "<br>";
                    //print_r($files);

                    $filename1 = $file1['name'];
                    $fileerror1 = $file1['error'];
                    $filetemp1 = $file1['tmp_name'];

                    $filename2 = $file2['name'];
                    $fileerror2 = $file2['error'];
                    $filetemp2 = $file2['tmp_name'];

                    $fileext1 = explode('.',$filename1);
                    $filecheck1 = strtolower(end($fileext1));

                    $fileext2 = explode('.',$filename2);
                    $filecheck2 = strtolower(end($fileext2));

                    $fileextstored1 = array('png','jpg','jpeg');
                    $fileextstored2 = array('png','jpg','jpeg');

                            if(in_array($filecheck1,$fileextstored1) && in_array($filecheck2,$fileextstored2) ){
                                
                                $destinationfile1 = 'upload/'.$filename1;
                                $destinationfile2 = 'upload/'.$filename2;
                                move_uploaded_file($filetemp1,$destinationfile1);
                                move_uploaded_file($filetemp2,$destinationfile2);
                                
                                $q = "INSERT INTO `imgupload`(`username`, `email`,`image`,`image2`) VALUES ('$username','$email','$destinationfile1','$destinationfile2')";

                                $query = mysqli_query($con,$q);

                                $s = "SELECT `image`, `image2` FROM `imgupload`  ";
                                $disquery = mysqli_query($con,$s);
                                while($res = mysqli_fetch_array($disquery)){
                                    ?>  
                                                                                                     
                                   <tr>                                               
                                    <td>
                                        <div class="container1">
                                            <img src=" <?php echo $res['image'] ?>" height="300px" width="500px" class="center">
                                            <form class="myform">
                                            <p class="vote-count">0</p>
                                            <button
                                                    class="vote-btn" 
                                                    data-default-text="Vote This Image Up!"
                                                    data-alt-text="Thanks for Voting">
                                                <span class="icon1"></span> <span class="text">Vote This Image Up!</span>
                                            </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="container1">
                                            <img src=" <?php echo $res['image2'] ?>" height="300px" width="500px" class="center">
                                            <form class="myform">
                                            <p class="vote-count">0</p>
                                            <button
                                                    class="vote-btn" 
                                                    data-default-text="Vote This Image Up!"
                                                    data-alt-text="Thanks for Voting">
                                                <span class="icon1"></span> <span class="text">Vote This Image Up!</span>
                                            </button>
                                            </form>
                                            
                                        </div>                                                                      
                                    </td>
                                    </tr>                                   
                                    
                                <?php
                                }

                                }
                                
                            }
                            
                        
                    ?> 
 </table>
</div>

    </body>
</html>