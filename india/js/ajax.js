$(document).ready(function()
    {
    $(".btnsave").click(function(){
    var element = $(this);
    var Id = element.attr("id");
    var test = $("#txttrans"+Id).val();
    var lang1 = $("#select1").val();
    var lang2 = $("#select2").val();
    var dataString = 'trans_text='+ test + '&trans_id=' + Id;
    if(test=='')
    {
    alert("Please Enter Some Text");
    }else
    {
    $("#flash"+Id).show();    
    $("#flash"+Id).fadeIn(200).html('<img src="images/ajax-loader.gif" align="absmiddle"> loading.....');
    $.ajax({
    type: "POST",
    url: "includes/update.php",
    data: dataString,
    cache: false,
    success: function(html){
        window.setTimeout(function() {
           if (lang1 == lang2) {
                $("#load_new"+Id).html(html);
           }           
           $("#flash"+Id).hide();
        }, 300);
    }});    
    }return false;
    });
    });
    function load_ajax(){
    $.ajax({
        url : "includes/result.php",
        type : "post", 
        dateType:"text", 
        data : { 
             from_lang_id : $('#select1').val(),
             trans_lang_id : $('#select2').val()
        },
        beforeSend: function(){
                $('#pic_load').removeClass('hide');
            },
        success : function (result){
            $('#pic_load').addClass('hide');
            $('#display').html(result);
        }
    });
}