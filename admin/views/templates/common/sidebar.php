<script>
window.onscroll = function() {myFunction()};
function myFunction() {
	var sidebar =  document.getElementById("myP");
    if (document.body.scrollTop > 68 || document.documentElement.scrollTop > 68) {
       sidebar.classList.add("aaa");
    } else {
        sidebar.classList.remove("aaa");
    }
}
</script>

 <div class="sidebar" id="myP">
	<div id="navigation"><span class="fa fa-bars"></span> Navigation</div>
	<ul id="menu">
		<?php 
			for ($i=0; $i < count($menu); $i++) {
		?> 
				<li>
					<a href="#collapse<?= $i ?>" data-toggle="collapse" class="parent collapsed" style="font-weight: bold;font-size: 15px;padding-left: 10px;"><i class="fa fa-<?= $menu[$i]['icon'] ?> fw"></i> <?= $menu[$i]['title'] ?></a>
					<ul id="collapse<?= $i ?>" class="collapse">
						<?php 
						for ($j=0; $j < count($menu[$i]['childen']); $j++) { 
						?>
							<li><a style="padding-left: 20px" href="<?= $menu[$i]['childen'][$j]['url'] ?>"><i class="fas fa-angle-right"></i><?= $menu[$i]['childen'][$j]['title'] ?></a></li>
						<?php	
						}
						?>
	        		</ul>
			    </li>
		<?php
			}
		?>	
				<li>
					<a href="#collapselg" data-toggle="collapse" class="parent collapsed"><i class="fa fa-language fw"></i> <?= $_['text_languages'] ?></a>
					<ul id="collapselg" class="collapse">
						<li><a href="?router=common/language&lg=en"><i class="fas fa-angle-right"></i>ENG</a></li>
						<li><a href="?router=common/language&lg=vn"><i class="fas fa-angle-right"></i>VNI</a></li>
	        		</ul>
			    </li>
		
	</ul>		



</div>