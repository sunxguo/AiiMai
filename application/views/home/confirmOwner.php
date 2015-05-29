<div class="main-floor no-border">
	<div class="register-header" style="background:none;">
		<h2>Find Password (Member Only)</h2>
		<p style="float:right;">Input some info > <strong>Confirm Owner</strong> > Create New Password > Completed</p>
	</div>
	<div class="register-main-body">
		<table>
			<tr>
				<td>
					<input type="radio" checked><span id="email"><?php echo $_GET['email'];?></span>
					<button onclick="sendConfirmEmail();" type="button" class="km-btn km-btn-primary" style="height: 28px;font-size: 12px;padding: 5px 20px;">Get Password-Reset Email</button>
					Email has been sent successfully!
				</td>
			</tr>
		</table>
		<div class="reg-btn">
			<input type="button" class="btn-big" id="btnRegister" onclick="findPasswordConfirm()" value="Go to Sign-in">
		</div>
	</div>
</div>
<script>
	sendConfirmEmail();
</script>