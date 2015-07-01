<div class="main-floor clearfix">
	<div style="margin:50px;">
		<h3>[AiiMai] Successfully Registered. | Confirm E-mail!</h3>
		<p style="color:blue;font-size:14px;line-height:30px;">
			<?php echo isset($_SESSION['userEmail'])?$_SESSION['userEmail']:'';?>
			<button onclick="sendEmail();" type="button" class="km-btn km-btn-success" style="margin-left:20px;height: 28px;font-size: 10px;padding: 5px 10px;">Send Email Again</button>
		</p>
	</div>
</div>

<script>
<?php if(!isset($_GET['auto']) || $_GET['auto']!='no'):?>
$(document).ready(function(){
	sendEmail();
});
<?php endif;?>
</script>