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

// leave space for footer
$('body')[0].style.paddingBottom = $('footer').outerHeight(true) + 'px';

// add target attribute to links pointing to other sites
function linkTarget() {
    $(document.links).filter(function() {
        return this.hostname != window.location.hostname;
    }).attr('target', '_blank');
}
$(linkTarget);

// tooltip
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
});

// pjax and nprogress
$(document).pjax('a:not([data-no-pjax])', '#body');
$(document).on('pjax:start', function() { NProgress.start(); });
$(document).on('pjax:end',   function() { NProgress.done();  });
$(function() {
    if ($(window).width() < 768) {
        $(document).on('pjax:end', function() { $('.collapse').collapse('hide'); });
    }
});
$(document).on('pjax:end', linkTarget);
$(document).on('pjax:end', function() { ga('send', 'pageview'); });
$(document).on('pjax:timeout', function(event) {
    // Prevent default timeout redirection behavior
    event.preventDefault();
});
