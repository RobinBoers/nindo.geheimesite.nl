<!DOCTYPE html>
<html>
    <head>
        <title>Nindo</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
<!--        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">-->
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
        <script src="library/website/nindo/notification.js"></script>
        <style>
        html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
        button, input, textarea {
            outline: none;
        }
        #inbox19 a, #sent19 a, #friends19 a {
            text-decoration: none;
        }
        h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, {
            text-decoration: none !important;
        }
        .post22222 img {
            max-width:100%;
        }
        @media screen and (min-width: 601px) {
          .post22222 {
            margin-left:16px;
            margin-right:16px;
          }
        }
        .modal {
          display: none; 
          position: fixed; 
          z-index: 1;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          overflow: auto; 
          background-color: rgb(0,0,0);
          background-color: rgba(0,0,0,0.4); 
          padding-top: 60px;
        }

        .modal-content {
          background-color: #fefefe;
          margin: 5% auto 15% auto; 
          border: 1px solid #888;
          width: 80%;
        }

        .close {
          position: absolute;
          right: 25px;
          top: 0;
          color: #000;
          font-size: 35px;
          font-weight: bold;
        }

        .close:hover,
        .close:focus {
          color: red;
          cursor: pointer;
        }

        .animate {
          -webkit-animation: animatezoom 0.6s;
          animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
          from {-webkit-transform: scale(0)} 
          to {-webkit-transform: scale(1)}
        }

        @keyframes animatezoom {
          from {transform: scale(0)} 
          to {transform: scale(1)}
        }

        @media screen and (max-width: 300px) {
          span.psw {
             display: block;
             float: none;
          }
          .cancelbtn {
             width: 100%;
          }
        }
        </style>
    </head>
    <body class="w3-theme-l5">

        <?php
            include "../../../php/nindo_header.php";
        ?>

        <!-- Page Container -->
        <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
          <!-- The Grid -->
          <div class="w3-row">
            <!-- Left Column -->
            <div class="w3-col m3">
              <div class="w3-container w3-card w3-white w3-round w3-margin-bottom">
                <p>OFFLINE</p>
              </div>
              <img class="w3-card w3-hide-small w3-margin-bottom w3-round" src="../../../images/nindo/logobig.png"paddin:2px; width="100%">
            </div>

            <!-- Middle Column -->
            <div class="w3-col m7">
                
            <div class="w3-container post22222 w3-card w3-white w3-round w3-margin-bottom"><br>
              <h1>Nindo is 0ffline</h1>
              <p>Nindo is vanaf 1 januari 2021 offline. Er kunnen geen berichten meer worden geplaatst,<br>
              profielen worden gemaakt of berichten worden verstuurd.<br>
              Accounts blijven online, maar worden allemaal overgezet naar geheimesite-accounts.<br>
              Dit betekent dat je gewoon kan inloggen, en dat je gebruik kan maken van andere apps die ik gemaakt heb.<br><br>
              Ik heb er erg van genoten Nindo te maken, en te onderhouden.<br>
              Als je intresse hebt in het project, kan je het op GitHub zien.<br>
              <a href="https://github.com/RobinBoers/Nindo">https://github.com/RobinBoers/Nindo</a></p>
            </div>

            <?php
              if(file_exists("posts.json") && filesize("posts.json") > 0){
                $handle = fopen("posts.json", "a+");
                $contents = fread($handle, filesize("posts.json"));
                $posts = json_decode($contents);
                fclose($handle);

                foreach($posts as $post){
                        
                          $profile_picture_feed = "/images/nindo/profiel.png";
                        ?>
                        <div class="w3-container post22222 w3-card w3-white w3-round w3-margin-bottom"><br>
                            <img src="<?php echo $profile_picture_feed ?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px;height:60px;">
                            <span class="w3-right w3-opacity"><?= $post->datum ?></span>
                            <h4>
                                <?= $post->auteur ?>
                            </h4>
                            <hr class="w3-clear">
                            <p>
                                <?php echo(nl2br($post->text)) ?>
                            </p>
                            <!--<button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i> &nbsp;<?= $post->likes ?></button> -->
            <!--                            <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i> &nbsp;Comment</button> -->
                        </div>
                        <?php
                    }    
                }
            ?>

            <!-- End Middle Column -->
          </div>
              
          <div class="w3-col m2">
              
            <?php if($_SESSION['login19'] == true) { ?>
                <div class="w3-card w3-round w3-white w3-center">
                    <div class="w3-container w3-padding">
                        <a href="/account/index.php">Mijn account</a><br>
                        <a href="/account/uitloggen.php">Uitloggen</a><br>
                    </div>
                </div>
            <?php } else { ?>
                <div class="w3-card w3-round w3-white w3-center">
                    <div class="w3-container w3-padding">
                        <a href="/account/inloggen.php">Inloggen</a><br>
                        <a href="/account/aanmelden.php">Aanmelden</a><br>
                    </div>
                </div>
            <?php } ?>
            <br>

              <div class="w3-card w3-round w3-white w3-padding-32 w3-center">
                <p><i class="fa fa-bug w3-xxlarge"></i></p>
              </div>

            <!-- End Right Column -->
            </div>

          <!-- End Grid -->
          </div>

        <!-- End Page Container -->
        </div>
        <br>

        <footer class="w3-container w3-theme-d3">
          <p>Gemaakt door Robin Boers. CSS Framework by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3schools.com</a></p>
        </footer>
        
      </body>
</html> 
