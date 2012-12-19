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

<!-- begin #page - the container for everything but header -->
<!-- <?php $location ?> -->
<div id="page">
  <div class="hero-unit center no-border">
    <div class="container">
      <h5>This Site provide information on local MSM & TG Community Based Organization (CBO) in the region. This site also allows you to share information about your organization and your work. It is also a place where you can upload research publication and other country information that you want to share with others.
</h5>
    </div>
    <!--close container--> 
  </div>
  <div class="container clearfix" id="main-content"> 
    <!--begin main content-->
    <div class="row-fluid center"> 
      <div class="span4">
        <h3 class="short_headline"><span>CBO Directory</span></h3>
        <div>
          <img class="thumbnail" src="assets/images/directory.jpg" />
          <p><strong>16 CBO Registered</strong></p>
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
      <div class="span4">
        <h3 class="short_headline"><span>CBO E-Library</span></h3>
        <img class="thumbnail" src="assets/images/iStock_Library.jpg" />
        <p><strong>160 Files Uploaded</strong></p>
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
      <div class="span4">
        <h3 class="short_headline"><span>Upload and share knowledge</span></h3>
        <img class="thumbnail" src="assets/images/register.jpg" />
        <p><strong>Start Sharing Now</strong></p>
          You can upload your organization profile and also knowledge material after you registered
          <br />
          <br />
          <a href="#" class="btn btn-warning">Register Now!!</a>
      </div>
    </div>
    <div class="border-t"></div>
    
    <div class="row-fluid center">
      <div class="span2">
        <a href="#"><img src="assets/images/flags/Indonesia-Flag.png" style="display:inline;" /></a>
        <h5>Indonesia</h5>
        <p class="center"><a href="#" class="btn btn-small btn-very-subtle">Visit &rarr;</a></p>
      </div>
      <div class="span2">
        <a href="#"><img src="assets/images/flags/Malaysia-Flag.png" style="display:inline;" /></a>
        <h5>Malaysia</h5>
        <p class="center"><a href="#" class="btn btn-small btn-very-subtle">Visit &rarr;</a></p>
      </div>
      <div class="span2">
        <a href="#"><img src="assets/images/flags/Brunei-Flag.png" style="display:inline;" /></a>
        <h5>Brunei Darussalam</h5>
        <p class="center"><a href="#" class="btn btn-small btn-very-subtle">Visit &rarr;</a></p>
      </div>
      <div class="span2">
        <a href="#"><img src="assets/images/flags/Singapore-Flag.png" style="display:inline;" /></a>
        <h5>Singapore</h5>
        <p class="center"><a href="#" class="btn btn-small btn-very-subtle">Visit &rarr;</a></p>
      </div>
      <div class="span2"> 
        <a href="#"><img src="assets/images/flags/Timor-Leste-Flag.png" style="display:inline;" /></a>
        <h5>Timor Leste</h5>
        <p class="center"><a href="#" class="btn btn-small btn-very-subtle">Visit &rarr;</a></p>
      </div>
      <div class="span2">
        <a href="#"><img src="assets/images/flags/Philippines-Flag.png" style="display:inline;" /></a>
        <h5>Philiphines</h5>
        <p class="center"><a href="#" class="btn btn-small btn-very-subtle">Visit &rarr;</a></p>
      </div>
    </div>
    <!--close row-fluid -->
    
  </div>
  <!--close .container id="main-content" -->

<?php

/* End of file home.php */
/* Location: /application/views/home/home.php */