			<?php 
			require("config.php");
			if(isset($_POST['from_lang_id']) and isset($_POST['trans_lang_id']))
			{
			  	$from_lang_id = $_POST['from_lang_id'];
			  	$trans_lang_id = $_POST['trans_lang_id'];
			}else{
			  	exit("error");
			}

			
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

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script type="text/javascript" src="js/ajax.js"></script>