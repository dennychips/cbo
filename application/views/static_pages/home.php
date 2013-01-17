<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
/**
 * Community Auth - Home View
 *
 * Community Auth is an open source authentication application for CodeIgniter 2.1.2
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2012, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */
?>


    <section id="color_header" class="clearfix">
            <div class="mainmenu ">
            <div class="mainmenu_inner">
                <div class="row clearfix">
                    <div class="grid_12">
                        <div class="sublogo">CBO e-Library</div>
                        <?php $this->load->view('nav')?>
                    </div>
                </div>
            </div>
        </div>  
        <script>
            var slider_fx='';
            var slider_timeout=6000;
            var slider_speed=300;
            var slider_navigation=1;
            var slider_fixedheight=0;
            var slider_padding=0;
            var slider_pause=1;
            var autoscroll=0;
        </script>
<div class="row" id="jcyclemain_navigation">
    <a href="#" id="slide_prev"><span>&lt;</span></a><a href="#" id="slide_next"><span>&gt;</span></a>
</div>
<div id="">
    <div class="row" style="color:white">
        <div class="span12" style="text-align:center">
            <h4>This Site provide information on local MSM & TG Community Based Organization (CBO) in the region. This site also allows you to share information about your organization and your work. It is also a place where you can upload research publication and other country information that you want to share with others.</h4>
        </div>
         <div class="span4" style="text-align:center">
        <h5 class="short_headline"><span>CBO Directory</span></h5>
        <div>
          <img class="thumbnail" src="assets/images/directory.jpg" />
          <p><strong><?php echo $profile_count?> CBO Registered</strong></p>
          On this website you can see list of CBO in each country and the profile each CBO. Select a country to see a list of CBO <br />
          <select>
            <option>-- Select Country --</option>
            <option>Indonesia</option>
            <option>Malaysia</option>
            <option>Brunei Darussalam</option>
            <option>Singapore</option>
            <option>Timor Lester</option>
            <option>Philiphines</option>
          </select>
          
        </div>
      </div>
      <div class="span4" style="text-align:center">
        <h5 class="short_headline"><span>CBO E-Library</span></h5>
        <img class="thumbnail" src="assets/images/iStock_Library.jpg" />
        <p><strong><?php echo $library_count?> Files Uploaded</strong></p>
          On this website you can see list of CBO in each country and the profile each CBO. Select a country to see a list of CBO 
          <br />
          <select>
            <option>-- Select Country --</option>
            <option>Indonesia</option>
            <option>Malaysia</option>
            <option>Brunei Darussalam</option>
            <option>Singapore</option>
            <option>Timor Lester</option>
            <option>Philiphines</option>
          </select>
      </div>
      <div class="span4" style="text-align:center">
        <h5 class="short_headline"><span>Upload and share knowledge</span></h5>
        <img class="thumbnail" src="assets/images/register.jpg" />
        <p><strong>Start Sharing Now</strong></p>
          You can upload your organization profile and also knowledge material after you registered
          <br />
          <br />
          <a href="#" class="btn btn-warning">Register Now!!</a>
      </div>

    </div>
    <br /><br />
</div>
<div id="navcycle">
<span></span>
</div>
</section>    

<section class="gray_line clearfix" id="title_sidebar">
    <div class="row">
        <div class="grid_12"><br /><br /><br /></div>
    </div>
</section>
<!-- header end -->
    <!-- Main Content Start -->
    <div role="main" id="main">
        <div id="contentarea" class="row">
            <div class="row center" style="margin-left:10px;">
              <div class="span2">
                <?php echo anchor('cbodirectory/country/indonesia', '<img width="100" src="assets/images/flags/Indonesia-Flag.png" style="display:inline;" />')?>
                <h5>Indonesia</h5>
                <p class="center"><?php echo anchor('cbodirectory/country/indonesia', 'Visit &rarr;','class="btn btn-small btn-info"')?></p>

              </div>
              <div class="span2">
                <?php echo anchor('cbodirectory/country/malaysia', '<img width="100" src="assets/images/flags/Malaysia-Flag.png" style="display:inline;" />')?>
                <h5>Malaysia</h5>
                 <p class="center"><?php echo anchor('cbodirectory/country/malaysia', 'Visit &rarr;','class="btn btn-small btn-info"')?></p>
              </div>
              <div class="span2">
                
                <?php echo anchor('cbodirectory/country/brunei-darussalam', '<img width="100" src="assets/images/flags/Brunei-Flag.png" style="display:inline;" />')?>
                <h5>Brunei Darussalam</h5>
                <p class="center"><?php echo anchor('cbodirectory/country/brunei-darussalam', 'Visit &rarr;','class="btn btn-small btn-info"')?></p>
              </div>
              <div class="span2">
                <?php echo anchor('cbodirectory/country/singapore', '<img width="100" src="assets/images/flags/Singapore-Flag.png" style="display:inline;" />')?>
                <h5>Singapore</h5>
                 <p class="center"><?php echo anchor('cbodirectory/country/singapore', 'Visit &rarr;','class="btn btn-small btn-info"')?></p>
              </div>
              <div class="span2"> 
                <?php echo anchor('cbodirectory/country/timor-leste', '<img width="100" src="assets/images/flags/Timor-Leste-Flag.png" style="display:inline;" />')?>
                <h5>Timor Leste</h5>
                 <p class="center"><?php echo anchor('cbodirectory/country/timor-leste', 'Visit &rarr;','class="btn btn-small btn-info"')?></p>
              </div>
              <div class="span2">
                <?php echo anchor('cbodirectory/country/philiphines', '<img width="100" src="assets/images/flags/Philippines-Flag.png" style="display:inline;" />')?>
                <h5>Philiphines</h5>
                 <p class="center"><?php echo anchor('cbodirectory/country/philiphines', 'Visit &rarr;','class="btn btn-small btn-info"')?></p>
              </div>
            </div>
        </div>
    </div>
<!-- Main Content end -->
<?php

/* End of file home.php */
/* Location: /application/views/home/home.php */