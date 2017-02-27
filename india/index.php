<?php
require("includes/config.php");

if(isset($_GET['from_lang_id']) and isset($_GET['trans_lang_id'])){
  $from_lang_id = $_GET['from_lang_id'];
  $trans_lang_id = $_GET['trans_lang_id'];
}else{
  $from_lang_id = 1;
  $trans_lang_id = 2;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Multiple languages website - Admincp</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container-fluid">
        <div class="container content text-left">
            <div class="row tl">
                <form id="language">
                <div class="col-md-3 col-lg-3">
                  Text fields
                </div>
                <div class="col-md-1 col-lg-1">
                  Country code
                </div>
                <div class="col-md-3 col-lg-3 relative1">
                  Choose a language:<br />
                  <?php
                  $arrlanguages = $conn->query("SELECT language_id, language_name FROM language");
                  ?>
                  <select name="from_lang_id" id="select1" class="form-control" onchange="load_ajax();">
                  <?php
                  $arrlanguages2 = array();
                  $key = 0;
                  while($language = $arrlanguages->fetch_assoc()){
                      echo '<option value="'.$language['language_id'].'"';
                      if($from_lang_id==$language['language_id']){
                        echo " selected";
                      }
                      echo '>'.$language['language_name'].'</option>';
                      $arrlanguages2[$key]= $language;
                      $key++;
                  }

                  ?>                    
                  </select>
                  <div id="pic_load" class="hide"><img src="images/ajax-loader.gif" align="absmiddle"></div>
                </div>
                <div class="col-md-4 col-lg-4">
                    Translate language:
                    <br />
                    <select name="trans_lang_id" id="select2" class="form-control" onchange="load_ajax()">
                    <?php
                    foreach ($arrlanguages2 as $key => $language) {
                        echo '<option value="'.$language['language_id'].'"';
                        if($trans_lang_id==$language['language_id']){
                        echo " selected";
                      }
                      echo '>'.$language['language_name'].'</option>';
                  }
                  ?>
                  </select>
                </div>
                <div class="col-md-1 col-lg-1">
                  Action
                </div>
                </form>
            </div>

            <?php 
                $result = $conn->query("SELECT text_strings.id, text_strings.text,country.country_flag,country.country_code,trans1.text AS trans_from,trans2.text AS trans_to, trans2.id as trans_id 
                FROM text_strings
                LEFT JOIN translated_strings AS trans1
                ON (text_strings.id=trans1.string_id AND trans1.lang_id=$from_lang_id)
                LEFT JOIN translated_strings AS trans2 
                ON (text_strings.id=trans2.string_id AND trans2.lang_id=$trans_lang_id)
                LEFT JOIN country 
                ON (text_strings.text=country.country_name)
                WHERE text_strings.type='country'
                ");
              
                             
            
            ?>
            <div class="row" id="display">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php
                    while ($row = $result->fetch_assoc()) { 
                    ?>
                     <div id="row<?=$row['trans_id']?>" class="row record">
                        <form name="form<?=$row['trans_id']?>" action="includes/update.php" method="post">
                        <div class="col-md-3 col-lg-3">
                            <span><?=$row['text']?></span>
                        </div>
                        <div class="col-md-1 col-lg-1">
                            <!-- <?=$row['country_flag']?> -->
                            <span><?=$row['country_code']?></span>
                        </div>
                        <div id="load_new<?=$row['trans_id']?>" class="col-md-3 col-lg-3">
                            <span><?=$row['trans_from']?></span>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <input type="text" id="txttrans<?=$row['trans_id']?>" name="txt<?=$row['trans_id']?>" class="form-control" value="<?=$row['trans_to']?>" title="">
                        </div>
                        <div class="col-md-1 col-lg-1">
                          <button id="<?=$row['trans_id']?>" type="submit" class="btn btn-sm btn-primary btnsave">Save</button>
                          <div id="loadplace<?=$row['trans_id']?>"></div>
        <div class="load-img" id="flash<?=$row['trans_id']?>"></div>
                        </div>
                        </form>
                    </div>
                <?php
                }
                ?>
                </div>
            </div> <!-- /#display -->
           
            
        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
      
    </script>
    <script type="text/javascript" src="js/ajax.js"></script>
  </body>
</html>