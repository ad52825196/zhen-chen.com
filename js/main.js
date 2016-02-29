// change the visibility of to-top automatically
$(window).scroll(function() {
    var scrollt = document.documentElement.scrollTop;
    if (scrollt > 40) { // should be the same value as #to-top.affix-top
        $('#to-top').removeClass('hidden');
    } else {
        $('#to-top').addClass('hidden');
    }
});

$('#to-top').affix({
    offset: {
        top: 40,
        bottom: function () {
            return (this.bottom = $('footer').outerHeight(true))
        }
    }
});

// lazy load for images
$('img.lazy').lazyload({
    threshold: 200
});

// add target attribute to links pointing to other sites
$(document.links).filter(function() {
    return this.hostname != window.location.hostname;
}).attr('target', '_blank');

// leave space for footer
$('body')[0].style.paddingBottom = $('footer').outerHeight(true) + 'px';
