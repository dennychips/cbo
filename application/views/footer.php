<!-- Footer Start -->
    <footer>
        <section id="footer_widgets" class="clearfix row">
            <aside class="grid_3">
                <div id="text-3" class="widget widget_text">
                    <h4 class="widget-title">About </h4>

                    <div class="textwidget">
                        ISEAN Survey Tools is a web-based Survey Tool CBOs among MSM & Transgender, develped by Satu Dunia and supported by ISEAN-Hivos Program.<br>
                        <br>
                        <a class='th_button simple_button_link' href='#'><span>more info</span></a>
                    </div>
                </div>
            </aside>

            <aside class="grid_3">
                <div id="nav_menu-3" class="widget widget_nav_menu">
                    <h4 class="widget-title">Recent Registered CBO</h4>
                    <div class="menu-main-container">
                        <?php $recent_profile = recent_item('cboprofile', 'customer_profile', 5);?>

                        <ul id="menu-main-2" class="menu">
                             <?php foreach ($recent_profile as $item) {
                                echo '<li><a href="'.site_url('cbodirectory/view/'.$item->user_id).'">'.$item->organization.'</a></li>';
                            }?>
                        </ul>
                    </div>
                </div>
            </aside>

            <aside class="grid_3">
                <div id="nav_menu-3" class="widget widget_nav_menu">
                    <h4 class="widget-title">Recent Uploads</h4>

                    <div class="menu-main-container">
                        <?php $recent_lib = recent_item('library', 'library_data',5)?>
                        <ul id="menu-main-2" class="menu">
                            <?php foreach ($recent_lib as $item) {
                                echo '<li><a href="'.site_url('elibrary/view/'.$item->id).'">'.$item->title.'</a></li>';
                            }?>
                        </ul>
                    </div>
</div>
            </aside>

            <aside class="grid_3">
                <div id="linkcat-2" class="widget widget_links">
                    <h4 class="widget-title">Links</h4>

                    <ul class='xoxo blogroll'>
                        <li><a href="http://isean.asia">ISEAN Website</a></li>
                        <li><a href="http://satudunia.net">SatuDunia</a></li>
                        <li><a href="http://hivos.nl">Hivos</a></li>
                    </ul>
                </div>
            </aside>

            <div class="grid_12 dotted"></div>
        </section>

        <div class="row" id="copyright">
            <div class="" style="text-align: center">
                <p>&copy; ISEAN 2012. Supported by ISEAN-Hivos Program, Developed by SatuDunia</p>
            </div>
        </div>

</footer>
 <!-- footer end -->

<?php
	// Insert any HTML before the closing body tag if desired
	if( isset( $final_html ) )
	{
		echo $final_html;
	}

	// Add the cookie checker
	if( isset( $cookie_checker ) )
	{
		echo $cookie_checker;
	}
?>
</body>
</html>