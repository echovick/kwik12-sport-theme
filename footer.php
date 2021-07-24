<footer class="bg-blue border-top-red">
    <div class="row pt-2 w-100">
        <div class="col-md-6">
            <div class="row w-100">
                <a href="<?php echo site_url()?>" class="text-light mr-3 txt-bold txt-md">Home</a>
                <a href="<?php echo site_url('about')?>" class="text-light mr-3 txt-bold txt-md">About Us</a>
                <a href="<?php echo site_url('contact')?>" class="text-light mr-3 txt-bold txt-md">Contact</a>
                <a href="<?php echo site_url('donations')?>" class="text-light mr-3 txt-bold txt-md">Donations</a>
            </div>
        </div>
        <div class="col-md-6">
            <p class="text-light" style="float: right;"> Kwik12 © 2021. All Rights Reserved.</p>
        </div>
    </div>
</footer>
<?php echo session_destroy()?>
</body>
<script src="https://cdn.jsdelivr.net/npm/clappr@latest/dist/clappr.min.js" type="22bf10955351dcb011de1d8b-text/javascript"></script>
<script type="22bf10955351dcb011de1d8b-text/javascript">
    var player = new Clappr.Player({
    source: "https://33872.liveplay.myqcloud.com/live/33872_my-live-1467209420423168-1824367.m3u8",
    parentId: "#player",
    width: "100%",
    height: "70vh",
    autoPlay: false,
    controls: true
    });
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-153958515-1" type="22bf10955351dcb011de1d8b-text/javascript"></script>
<script type="22bf10955351dcb011de1d8b-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-153958515-1');
</script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="22bf10955351dcb011de1d8b-|49" defer=""></script>
<?php wp_footer();?>
</html>