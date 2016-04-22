<!-- Begin Comment -->
<div id="disqus_thread"></div>
<script>
    var disqus_config = function () {
        this.page.url = '{{ $meta["canonical"] or "" }}';
        this.page.identifier = '{{ $meta["pageIdentifier"] or "" }}';
    };

    (function() {
        // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = '//zhenchencom.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the comments.</noscript>
<!-- End Comment -->
