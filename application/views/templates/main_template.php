<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('head')?>
<body id="<?php echo $this->router->fetch_class() . '-' . $this->router->fetch_method(); ?>" class="<?php echo $this->router->fetch_class(); ?>-controller <?php echo $this->router->fetch_method(); ?>-method apps">
<?php $this->load->view('header')?>    

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
            <div class="cycle_content cycle_col grid_12 " >
                <div class="">
                    <!-- <h4 class="entry-title">Create Survey</h4> -->
                    <div class="entry-content">
                        <div class="leftContent">
                            <h3>Welcome to ISEAN Survey Tools</h3>
                            <p>ISEAN Survey Tools is a web-based Survey Tool designed 
    for the ISEAN-Hivos Program for CBOs among MSM & Transgender.
                            </p>
                        </div>
                        <div class="rightContent">
                            <div class="innerContentwrap">
                                <div class="start-header">Start Today</div>
                                <div class="btnSign">
                                    <div class="desc-head">For Unlimited Surveys &amp; Responses</div>
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
                <img width="250" src="/survey/themes/default/images/column_chart.png" />
            </div>
            <div class="cycle_content cycle_col grid_9">
                <h4 class="entry-title">Publish your research publication </h4>
                <div class="entry-content">
                    <p>Through this website, you allow to publish your research publication <br />
related with MSM & Transgender. </p>
                    
                </div>
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
<!-- header end --><div>
    <!-- Main Content Start -->
    <div role="main" id="main">
        <div id="contentarea" class="row">
            <div class="grid_12">
                <article id="page-11" class="post-11 page type-page status-publish hentry clearfix">
                    <div class="entry-content">
                        <div class="stepImg">
                            <img src="/survey/themes/default/images/steps.png" />
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
<!-- Main Content end -->
</div>
<?php $this->load->view('footer');?>