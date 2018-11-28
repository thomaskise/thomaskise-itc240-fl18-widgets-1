<?php include 'includes/config.php'?>
<?php get_header()?>
<?php include 'includes/dayswitch.php'?>
    
        <h2 class="post-title">Checkout our daily specials:</h2>
		<nav id=specialsNav>
			<ul>
                <li><a href="dailyspecials.php?day=Sunday">Sunday</a></li>
                <li><a href="dailyspecials.php?day=Monday">Monday</a></li>
                <li><a href="dailyspecials.php?day=Tuesday">Tuesday</a></li>
                <li><a href="dailyspecials.php?day=Wednesday">Wednesday</a></li>
                <li><a href="dailyspecials.php?day=Thursday">Thursday</a></li>
                <li><a href="dailyspecials.php?day=Friday">Friday</a></li>
                <li><a href="dailyspecials.php?day=Saturday">Saturday</a></li>
			</ul>
		</nav>
        <hr> 
        <br />

        <h2 class="post-title"><?=$today?>'s Coffee Special is <em><?=$coffee?></em></h2>
        <p>
            <?=$shortDescription?>
		</p>
        <h3 class="post-meta">
			<img class="flexible" src="images/<?=$pic?>" alt="<?=$alt?>" id="coffee" />
        </h3>
        <p class="post-meta">
			<em><?=$coffee?> is </em> gluten-free selfies normcore chillwave. Listicle 90's chambray, seitan cold-pressed try-hard Etsy authentic flexitarian vinyl. Meditation bespoke freegan, single-origin coffee cred seitan 90's gentrify brunch Williamsburg squid cold-pressed. Brooklyn readymade Tumblr wayfarers ethical. 
        </p>
		<p class="post-meta">
			<em>On <?=$today?> Only!!</em> Mention when you order that it is <em><?=$colorName?> <?=$today?></em> and you'll receive a free <em><?=$dailySnackSpecial?>!</em>
		</p>
        <p class="post-meta">
			<em>Enjoy <?=$coffee?> with our </em> Polaroid iPhone plaid, Pitchfork Shoreditch paleo. Hashtag keytar chia scenester Pinterest, semiotics tousled food truck. YOLO scenester deep v, taxidermy paleo quinoa McSweeney's Carles VHS mustache Williamsburg gluten-free readymade cold-pressed. Truffaut Thundercats Schlitz, listicle organic Brooklyn paleo squid asymmetrical readymade migas gluten-free Austin.
		</p> 

        <hr> 

		<p class="post-meta">
			<b>At Wild Duck we aspire to: </b>Aesthetic gentrify YOLO McSweeney's typewriter single-origin coffee. Slow-carb hella listicle lomo, Helvetica single-origin coffee butcher stumptown. Chambray try-hard church-key mumblecore, tote bag PBR cardigan. Retro Austin Brooklyn, blog Intelligentsia gentrify jean shorts sartorial bicycle rights gastropub. Aesthetic wayfarers Pitchfork, tattooed Carles quinoa meh leggings distillery pork belly banjo. Umami cred lumbersexual skateboard, pork belly Tumblr vegan letterpress. Fixie bicycle rights butcher chillwave, gluten-free health goth Echo Park locavore whatever.
        </p>
		<p class="post-meta">
		Gluten-free selfies normcore chillwave. Listicle 90's chambray, seitan cold-pressed try-hard Etsy authentic flexitarian vinyl. Meditation bespoke freegan, single-origin coffee cred seitan 90's gentrify brunch Williamsburg squid cold-pressed. Brooklyn readymade Tumblr wayfarers ethical. Biodiesel VHS Godard High Life, tousled Banksy craft beer. Mlkshk direct trade locavore, mumblecore keytar artisan hashtag fap. Cred cronut Brooklyn, locavore art party small batch PBR semiotics ennui kitsch taxidermy mlkshk stumptown.
		</p>
		<p class="post-meta">
		Polaroid iPhone plaid, Pitchfork Shoreditch paleo. Hashtag keytar chia scenester Pinterest, semiotics tousled food truck. YOLO scenester deep v, taxidermy paleo quinoa McSweeney's Carles VHS mustache Williamsburg gluten-free readymade cold-pressed. Truffaut Thundercats Schlitz, listicle organic Brooklyn paleo squid asymmetrical readymade migas gluten-free Austin. Etsy Wes Anderson 8-bit retro, polaroid synth paleo banh mi before they sold out Vice. Bushwick fap Intelligentsia, whatever Etsy High Life Kickstarter migas retro Banksy YOLO Carles yr raw denim. Gluten-free fixie taxidermy pop-up, actually Kickstarter flannel put a bird on it master cleanse.
		</p>
		<p class="post-meta">
		Text provided by <a href="http://hipsum.co/" target="_blank">Hipster Ipsum</a>
		</p>


<?php get_footer()?>