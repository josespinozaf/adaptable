<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Version details
 *
 * @package    theme_adaptable
 * @copyright  2015-2016 Jeremy Hopkins (Coventry University)
 * @copyright  2015-2016 Fernando Acedo (3-bits.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 */

require_once(dirname(__FILE__) . '/includes/header.php');

$left = theme_adaptable_get_block_side();

$hasfootnote = (!empty($PAGE->theme->settings->footnote));

if(!isloggedin()){
if (!empty($PAGE->theme->settings->sliderenabled)) {
    echo $OUTPUT->get_frontpage_slider();
}
}
if (!isloggedin()){
if (!empty($PAGE->theme->settings->infobox)) {
    if (!empty($PAGE->theme->settings->infoboxfullscreen)) {
        echo '<div id="theinfo">';
    } else {
        echo '<div id="theinfo" class="container">';
    }

?>
            <div class="row-fluid">
                <?php echo $OUTPUT->get_setting('infobox', 'format_html'); ?>
            </div>
        </div>
 
<?php
}
}
?>
<?php 
if (is_siteadmin()){
echo '<p align="left"><i class="fa fa-pencil-square-o"></i><a href="admin/settings.php?section=theme_adaptable_frontpage_ticker"> Editar Noticias</a></p>';
}
if(isloggedin()){
	?>
<style>
.container1 {
/*     position: inline; */
/*     width: 40%; */
    border-radius: 15px; 
  	padding: 0px 15px 0px 15px; 
	margin: 5px;
    float: left;
    width: 45%;
}

.image {
  opacity: 1;
  display: block;
  width: 150px;
  height: 150px;
  margin: 5px;	
  transition: .5s ease;
  backface-visibility: hidden;
  border-radius: 15px;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  float: left;
  position: relative;
  top: -70px;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%)
}

.container1:hover .image {
  opacity: 0.3;
}

.container1:hover .middle {
  opacity: 1;
}

.text {
  color: #851924;
  font-family:  Arial;
  font-size: 45px;
  border-radius: 15px;
}
</style>
<div class="container1">
<a href="local/wellness/imc.php">
  <img src="local/wellness/pix/frontpage/infraestructura.jpg" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Revisa TU IMC </div>
  </div>
  </a>
</div>
<div class="container1">
<a href="local/wellness/clases.php">
<img src="local/wellness/pix/frontpage/Cross-Trainning.jpg" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Revisa las CLASES </div>
  </div>
  </a>
</div>
<div class="container1">
  <a href="local/wellness/saladepesas.php">
  <img src="local/wellness/pix/frontpage/gym.jpg" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Revisa las RUTINAS</div>
  </div>
  </a>
</div>
<div class="container1">
<a href="/moodle/calendar/view.php?view=month">
  <img src="local/wellness/pix/frontpage/corrida.jpg" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Concepto Wellness </div>
  </div>
  </a>
</div>
<div class="container1" style="display: inline">
<?php }
if (is_siteadmin()){
	echo '<br><br><p align="left"><i class="fa fa-pencil-square-o"></i><a href="admin/settings.php?section=theme_adaptable_frontpage_blocks"> Editar Imagen Evento y Videos</a></p>';
}
?>
</div>
<?php if (!empty($PAGE->theme->settings->frontpagemarketenabled)) {
    if (isloggedin())
    	echo $OUTPUT->get_marketing_blocks();
} 



?>

<?php if (!empty($PAGE->theme->settings->frontpageblocksenabled)) { ?>
    <div id="frontblockregion" class="container">
        <div class="row-fluid">
            <?php echo $OUTPUT->get_block_regions(); ?>
        </div>
    </div>
<?php
}
?>

<?php
if (isloggedin()){
if (!empty($PAGE->theme->settings->infobox2)) {
    if (!empty($PAGE->theme->settings->infoboxfullscreen)) {
        echo '<div id="themessage">';
    } else {
        echo '<div id="themessage" class="container">';
    }
?>

    <div id="themessage-internal">
        <div class="row-fluid">
<?php echo $OUTPUT->get_setting('infobox2', 'format_html'); ?>
        </div>
    </div>
</div>
<?php
}
}
?>
<div class="container outercont">
    <div id="page-content" class="row-fluid">
     <div id="page-navbar" class="span12">
            <nav class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></nav>
            <?php echo $OUTPUT->navbar(); ?>

    </div>

<?php
if (isloggedin){
// Left Sidebar.
if (($left == 1) && $PAGE->blocks->region_has_content('side-post', $OUTPUT)) {
    echo $OUTPUT->blocks('side-post', 'span3 desktop-first-column');
}

// Main Region.
if ($PAGE->blocks->region_has_content('side-post', $OUTPUT)) {
    if ($left == 1) {
        echo '<section id="region-main" class="span9" style="margin-left: 30px;">';
    } else {
        echo '<section id="region-main" class="span9" style="margin: 0;">';
    }
}

if (is_siteadmin()){
	echo '<p align="left"><i class="fa fa-pencil-square-o"></i><a href="admin/settings.php?section=theme_adaptable_frontpage_slider"> Editar Carrusel de Diapositivas</a></p>';
	echo '<p align="left"><i class="fa fa-pencil-square-o"></i><a href="admin/settings.php?section=theme_adaptable_frontpage_alert"> Editar Alertas</a></p>';
}

echo $OUTPUT->course_content_header();

echo $OUTPUT->main_content();

echo $OUTPUT->course_content_footer();
}
?>

</section>

<?php

// Right Sidebar.
if(isloggedin()) {
if (($left == 0) && $PAGE->blocks->region_has_content('side-post', $OUTPUT)) {
    echo $OUTPUT->blocks('side-post', 'span3');
}
}
?>

</div>

 <?php
// if (is_siteadmin()) {
// ?>
<!--       <div class="hidden-blocks"> -->
<!--         <div class="row-fluid"> -->
          <h4><?php //echo get_string('frnt-footer', 'theme_adaptable') ?></h4>
          <?php
//             //echo $OUTPUT->blocks('frnt-footer', 'span10');
//           ?>
<!--         </div> -->
<!--       </div> -->
    <?php
// }
// ?>
</div>

<?php
require_once(dirname(__FILE__) . '/includes/footer.php');
