<div class="main-floor no-border">
	<div class="register-header" style="background:none;">
		<h2>Find Password (Member Only)</h2>
		<p style="float:right;"><strong>Input some info</strong> > Confirm Owner > Create New Password > Completed</p>
	</div>
	<div class="register-main-body">
		<table>
			<tr>
				<td>Email</td>
				<td>
					<input type="text" id="email" placeholder="example:xxx@gmail.com" class="inp-txt width250">
				</td>
			</tr>
			<tr>
				<td>Security check</td>
				<td class="veri-code">
					<img id="validCodeImg" src="" onclick="refreshCode()"> 
                    <a href="javascript:refreshCode()">Refresh</a>
                    <input type="text" id="validCode" placeholder="" class="inp-txt width100">
				</td>
			</tr>
		</table>
		<div class="reg-btn">
			<input type="button" class="btn-big" id="btnRegister" onclick="findPasswordConfirm()" value="Confirm">
		</div>
	</div>
</div>
<script>
	refreshCode();
</script>