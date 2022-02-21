
    $("#user-menu-button").click(function(){
        if($("#user-menu").hasClass("hidden")){
        $("#user-menu").removeClass("hidden");
        }else{
        $("#user-menu").addClass("hidden");
        }
    });
    
    $("#menu-hamburger").click(function(){
        if($("#mobile-menu").hasClass("hidden")){
        $("#mobile-menu").removeClass("hidden");
        $("#hamburger-icon").addClass("hidden");
        $("#cross-icon").removeClass("hidden");
        }else{
        $("#mobile-menu").addClass("hidden");
        $("#cross-icon").addClass("hidden");
        $("#hamburger-icon").removeClass("hidden");
        }
    });
    
    $("#user-menu-item-2").click(function(){
        let formData = {logout: $(this).val()};
        $.post("php/do_logout.php", formData).done(function(data) {
        location.reload();
        });
    });


