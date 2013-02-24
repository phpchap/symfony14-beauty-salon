<?php use_helper('Pagination'); ?>
<script type="text/javascript" src="/js/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" type="text/css" href="/css/jquery.lightbox-0.5.css" media="screen" />
<script type="text/javascript">
$(function() {
	$('a.lightbox').lightBox(); // Select all links with lightbox class
});
</script>
<div id="doc4" class="yui-t7" style="padding-top:10px;-moz-border-radius: 3px;-webkit-border-radius: 3px;background: rgba(10, 10, 10, 0.7); ">		
    <?php include_partial('header',array('action_name' => $action_name)) ?>
    <div id="bd" role="main">
        <div class="yui-g">
            <!-- TOP BREADCRUMB/PAGINATION CONTAINER -->
            <div style="width:100%;margin:5px 0 5px 0">
                <!-- BREADCRUMB -->
                <div class="gallery_container">
                    <h3><a href="<?php echo url_for("@homepage");?>">Home</a> >> Book Appointment</h3>
                </div>
                
                <iframe src="http://beckbeauty.zanadoo.me/website_widget" width="860px" height="750px"></iframe>
                
                <div style="clear:both"></div>
            </div>
            <div class="gallery_container">

                
            </div>
        </div>
    </div>
    <?php include_partial('footer') ?>
</div>
