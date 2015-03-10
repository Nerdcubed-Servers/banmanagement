<?php
/*  BanManagement � 2012, a web interface for the Bukkit plugin BanManager
    by James Mortemore of http://www.frostcast.net
	is licenced under a Creative Commons
	Attribution-NonCommercial-ShareAlike 2.0 UK: England & Wales.
	Permissions beyond the scope of this licence 
	may be available at http://creativecommons.org/licenses/by-nc-sa/2.0/uk/.
	Additional licence terms at https://raw.github.com/confuser/Ban-Management/master/banmanagement/licence.txt
*/
?>
		
			<footer class="full-width">
				<!-- Must not be removed as per the licence terms -->
				<p>Created By <a href="http://www.frostcast.net" target="_blank">
					<img src="img/brand.png" alt="Frostcast" id="copyright_image" />
				</a></p>
			</footer>
		</div> <!-- /container -->
		<script src="//<?php echo $path; ?>js/excanvas.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

		<!-- Add jQuery plugins below -->

		<script src="//<?php echo $path; ?>js/bootstrap.min.js"></script>
		<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
		<script src="//<?php echo $path; ?>js/heartcode-canvasloader-min.js"></script>
		<script src="//<?php echo $path; ?>js/jquery.countdown.min.js"></script>
		<script src="//<?php echo $path; ?>js/jquery.tablesorter.min.js"></script>
		<script src="//<?php echo $path; ?>js/jquery.tablesorter.widgets.min.js"></script>
		<script src="//<?php echo $path; ?>js/jquery.tablesorter.pager.min.js"></script>
		<?php // Only include if on the viewplayer page, no need for extra HTTP requests for something we're not using
		if(isset($_GET['action']) && $_GET['action'] == 'viewplayer'): ?>
		<script src="//<?php echo $path; ?>js/excanvas.js"></script>
		<script src="//<?php echo $path; ?>js/jquery.minecraftskin.js"></script>
		<script src="//<?php echo $path; ?>js/jquery.mCustomScrollbar.concat.min.js"></script>
		<?php endif; ?>
		<script src="//<?php echo $path; ?>js/core.js"></script>
		<?php
			if((isset($settings['iframe_protection']) && $settings['iframe_protection']) || !isset($settings['iframe_protection'])) {
				echo '
					<script type="text/javascript">
						if (top.location != self.location) { top.location = self.location.href; }
					</script>';
			}
			if(isset($_SESSION['admin']) && $_SESSION['admin']) {
				echo '
					<script type="text/javascript">
						var authid = \''.sha1($settings['password']).'\';
					</script>';
				echo '
					<script src="//'.$path.'js/moment-with-langs.min.js"></script>
					<script src="//'.$path.'js/bootstrap-datetimepicker.min.js"></script>
					<script src="//'.$path.'js/admin.js"></script>
			';
			}
		?>
		<script type="text/javascript">
			$(function() {
				$(".col-lg-4 button[rel='popover']").popover({trigger: 'hover', placement: 'left'});
				$("#search li").click(function(e) {
					var s = $(this);
					if(s.attr("id") == 'ip') {
						var player = $("#player");
						$("#ip").attr('id', 'player').find("a").text('Player');
						player.attr('id', 'ip').html('IP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"></span>');
						$("#search input[type=text]").attr('placeholder', 'Enter IP Address');
						$("#search input[name=action]").attr('value', 'searchip');
					} else {
						var ip = $("#ip");
						$("#player").attr('id', 'ip').find("a").text('IP');
						ip.attr('id', 'player').html('Player <span class="caret"></span>');
						$("#search input[type=text]").attr('placeholder', 'Enter Player Name');
						$("#search input[name=action]").attr('value', 'searchplayer');
					}
				});
				$("#viewall").click(function() {
					var server = $("#search input[name=server]:checked").val();
					
					 if(typeof server === 'undefined')
						server = 0;
					
					window.location.href = 'index.php?action='+$("#search input[name=action]").val()+'&server='+server+'&player=%25';
				});
			});
		</script>
	</body>
</html>