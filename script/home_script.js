$( function(){

    animate_menubox();
    animate_submenu();

});

function animate_menubox()
{
    $('.menu .menubox .info').css("filter", "alpha(opacity=00)");
    
    $('.menu .menubox').hover(function(){
        $(this).stop().animate({
            backgroundColor : '#f1f1f1'
        });
        $(this).children('.info').stop().animate({
            width : '120px',
            opacity : '1'
        }, 500);
    } , function(){
        $(this).stop().animate({
            backgroundColor : '#fff'
        });
        $(this).children('.info').stop().animate({
            width : '110px',
            opacity : '0'
        }, 500);
    }
    );
}

function animate_submenu()
{
    var isanimated = false;

    $('.menu .menubox .submenu').addClass('collapsed').hide();
    $('.menu .menubox a.expandable').click(function(){
        if(!isanimated){
            isanimated = true;
            $(this).parent().find('.submenu.collapsed').slideDown('500', function(){
                $(this).removeClass('').addClass('expanded');
                isanimated = false;
            });
        }
        return false;
    });
    $('.menu .menubox a.expandable').click(function(){
        if(!isanimated){
            isanimated = true;
            $(this).parent().find('.submenu.expanded').slideUp('500', function(){
                $(this).removeClass('expanded').addClass('collapsed');
                isanimated = false;
            });
        }
        return false;
    });
}