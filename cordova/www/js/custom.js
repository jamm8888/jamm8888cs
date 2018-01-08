 $(function() {
    
    $('#nav').affix({
        offset: {
            top: $('#nav').offset().top,
            bottom: $('footer').outerHeight(true) + $('.application').outerHeight(true) + 40
        }
    });
    //# sourceURL=pen.js
    var shiftWindow = function() { scrollBy(0, -50) };
    window.addEventListener("hashchange", shiftWindow);
    function load() { if (window.location.hash) shiftWindow(); }
 });