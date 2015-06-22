	</div>
	<div class="footer">
		<?php if(!isset($showFooter) || $showFooter):?>
		<div class="nav-footer-common">
			<ul class="list">
				<li><a href="/home/info?key=about">About AiiMai</a></li>
				<li><a href="/home/info?key=userAgreement">User Agreement</a></li>
				<li><a href="/home/info?key=privacyPolicy">Privacy Policy</a></li>
				<li><a href="/home/info?key=partnership">Partnership</a></li>
				<li><a href="/home/cms/register">Seller Register</a></li>
				<li><a href="/home/info?key=help">Help</a></li>
				<li><a href="/home/info?key=qsafeProgram">Qsafe Program</a></li>
			</ul>
		</div>
		<?php endif;?>
		<div class="info">
			<span><address>Copyright ©2015 <strong>AiiMai</strong>. All Rights Reserved.<br>In cooperation with <span class="ebay"><em>ebay</em></span></address></span>
			<span class="act_ntfctn">
				<a href="">Copyright Act Notification</a>
			</span>
			<p class="sponsor verisign">
				<a class="norton" onclick="window.open(this.href, 'VRSN_Splash', 'location=yes,status=yes,resizable=yes,scrollbars=yes,width=560,height=500'); return false;" href="https://trustsealinfo.verisign.com/splash?form_file=fdf/splash.fdf&amp;dn=www.aiimai.com&amp;lang=en">
					<img src="http://static.image-gmkt.com/qoo10/front/cm/common/image/norton_logo_100x72.gif" alt="Click to Verify - This site has chosen an SSL Certificate to improve Web site security">
				</a> 					
			</p>
		</div>
	</div>
	<div id="waitDiv"><img src="/assets/images/cms/loading.gif"></div>
	<div id="bkDiv"></div>
	<div id="messageAlert" class="km-alert km-alert-dismissible fade in width40p hide">
      <button type="button" class="km-close" onclick="$('#messageAlert').hide();"><span>×</span></button>
      <strong></strong>
	  <span class="km-alert-msg"></span>
    </div>
</body>
</html>
