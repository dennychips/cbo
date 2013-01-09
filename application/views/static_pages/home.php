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
<div id="jcyclemain">
        <div class="jcyclemain right" data-slidesize="300">
    <div class="bgimage ">
        <div class="row">
            <div class="cycle_content cycle_col grid_12">
                <div class="">
                    <!-- <h4 class="entry-title">Create Survey</h4> -->
                    <div class="entry-content">
                        <div class="leftContent">
                            <h3>Welcome to CBO E-Library</h3>
                            <p>This Site provide information on local MSM & TG Community Based Organization (CBO) in the region. This site also allows you to share information about your organization and your work. It is also a place where you can upload research publication and other country information that you want to share with others.
                            </p>
                        </div>
                        <div class="rightContent">
                            <div class="innerContentwrap">
                                <div class="start-header">Start Today</div>
                                <div class="btnSign">
                                    <div class="desc-head">To Share &amp; Upload Knowldge</div>
                                    <a href="/survey/users/user/register" class="btn btn-large btn-warning" style="width:219px">Sign Up Free!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    </div>
    <div class="jcyclemain left" data-slidesize="300">
    <div class="bgimage ">
        <div class="row">
            <div class="grid_3">
                <img class="thumbnail" src="<?php echo site_url('assets/images/directory.jpg'); ?>" />
            </div>
            <div class="cycle_content cycle_col grid_9">
                <h4 class="entry-title">CBO E-Library</h4>
                <p><strong><?php echo $profile_count?> CBO Registered</strong></p>
                <div class="entry-content">
                    <p>On this website you can see list of CBO in each country and the profile each CBO. </p>
                    <p>Select a country to see a list of CBO: </p>
                    
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
        </div>  
    </div>
    </div>
    <div class="jcyclemain left" data-slidesize="300">
    <div class="bgimage ">
        <div class="row">
            <div class="grid_3">
                <img class="thumbnail" src="assets/images/iStock_Library.jpg" />
            </div>
            <div class="cycle_content cycle_col grid_9">
                <h4 class="entry-title">CBO E-Library</h4>
                <?php if($library_count != 0): ?>
                <p><strong><?php echo $library_count?> Files Uploaded</strong></p>
                <div class="entry-content">
                    <p>On this website you can see knowledge material from cbo in the region.</p>
                    <p>Select a Country below to see a list of uploaded material.</p>
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
                <?php else : ?>
                <p><strong>No Files Uploaded Yet. Start Sharing Now</strong></p>
                <div class="entry-content">
                    <div class="innerContentwrap" style="width:261px;">
                        <div class="start-header">Start Today</div>
                        <div class="btnSign">
                            <a href="/survey/users/user/register" class="btn btn-large btn-warning" style="width:219px">Sign Up Free!</a>
                        </div>
                    </div>
                </div>
                <?php endif;?>
            </div>
        </div>  
    </div>
    </div>  
    
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