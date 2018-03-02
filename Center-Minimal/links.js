//Change logo icons on hover
$(document).ready(function(){
    $("#git").on({
        mouseenter: function() {
            $(this).attr('src', 'img/GitHub-Hover.png');
        },
        mouseleave: function() {
            $(this).attr('src', 'img/GitHub-Original.png');
        }
    });
    
    $("#linked").on({
        mouseenter: function() {
            $(this).attr('src', 'img/LinkedIn-Hover.png');
        },
        mouseleave: function() {
            $(this).attr('src', 'img/LinkedIn-Original.png');
        }
    });
    
    $("#download").on({
        mouseenter: function() {
            $(this).attr('src', 'img/Download-Hover.png');
        },
        mouseleave: function() {
            $(this).attr('src', 'img/Download-Original.png');
        }
    });
});