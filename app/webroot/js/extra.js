$(function() {
    if ($('.accordion').length) {
        var accs = $('.accordion');
        accs.each(function() {
            var acc = $(this);
            acc.on('click', function() {
                acc.toggleClass('active');
                
                var panel = $(acc.next());
                var panelH = panel.prop('scrollHeight') + "px";
                if(panel.css('max-height') == "0px") {
                    panel.css('max-height', panel.prop('scrollHeight') + "px");
                } else {
                    panel.css('max-height', "0px");
                } 
            });
        });
    }
});