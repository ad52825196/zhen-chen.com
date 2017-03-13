<div id="disqus_thread"></div>
<script>
    var disqus_config = function () {
        this.page.url = '{{ $canonical }}';
        this.page.identifier = '{{ $pageIdentifier }}';
    };

    (function() {
        // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = '//zhenchencom.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>{{ __('disqus.noscript') }}</noscript>
