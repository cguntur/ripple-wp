( function( $ ) {
    $("#theme_install_options").dialog({
        modal: true,
        autoOpen: false,
        dialogClass: 'ripple_wp_layout_install',
        //width:'80%',
        //minHeight:'500px',
        //height:'500px',
    });

    //alert("Hello!");
    $(".install_layout").click(function(){
        var layout_option = $(this).attr("id");
        //alert("layout_option");
        $('#theme_install_options').dialog("open");
        $.ajax({
          url: ajaxurl,
          type:'post',
          data: {
            'action': 'ripple_wp_layout_install',
            'layout_option': layout_option,
          },
          success: function(response){
              $(".layout_install").html(response);
          },
        });
            
    });
}( jQuery ) );