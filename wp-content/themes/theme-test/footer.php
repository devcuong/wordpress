 
<footer id="info">
		 <div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="footer">
						<h3 class="title-f">Giới Thiệu</h3>
						<div class="line-f">
							<div class="left-line"></div>
							<div class="right-line"></div>
						</div>
						<div class="clear"></div>						
						 
						<p><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('gioi-thieu')) : ?><?php endif; ?>
						</p>
					</div>
				</div>
				
				 <div class="col-md-4">
					<div class="footer">
						<h3 class="title-f">Thông tin nổi bật</h3>
						<div class="line-f">
							<div class="left-line"></div>
							<div class="right-line"></div>
						</div>
						<div class="clear"></div>						
						 
						<p>
							<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('thong-tin-noi-bat')) : ?><?php endif; ?>
						</p>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="footer">
						<h3 class="title-f">Liên hệ</h3>
						<div class="line-f">
							<div class="left-line"></div>
							<div class="right-line"></div>
						</div>
						<div class="clear"></div>						
						 
						<p>
							<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('lien-he')) : ?><?php endif; ?>
						</p>
					</div>
				</div>
				 
			</div>
	</div>
		
	</footer>
<script type="text/javascript">
$("#menu-item-93 a.dropdown-toggle").attr("href", "http://chungcumini.com.vn/du-an-chung-cu-mini/")
$("#menu-item-93 a.dropdown-toggle").click(function() {
  window.location.replace("http://chungcumini.com.vn/du-an-chung-cu-mini/");
});
</script> 
<script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",23189]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>

</body>
</html>

