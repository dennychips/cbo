<!-- begin #main_menu -->
<nav id="main_menu" class="main_menu">
  <ul class="sf-menu clearfix">
    <li><?php echo anchor('/', 'Home') ?></li>
    <li><?php echo anchor('about', 'About') ?></li>
    <li class="parent"><?php echo anchor('cbodirectory', 'CBO Directory<i></i>')?>
      <ul>
        <li><?php echo anchor('cbodirectory/country/indonesia', 'Indonesia')?></li>
        <li><?php echo anchor('cbodirectory/country/malaysia', 'Malaysia') ?></li>
        <li><?php echo anchor('cbodirectory/country/philiphines', 'Philiphines') ?></li>
        <li><?php echo anchor('cbodirectory/country/singapore', 'Singapore') ?></li>
        <li><?php echo anchor('cbodirectory/country/timor-leste', 'Timor Leste') ?></li>
        <li><?php echo anchor('cbodirectory/country/brunei-darussalam', 'Brunei Darussalam') ?></li>
      </ul>
    </li>
    <li class="parent"><?php echo anchor('elibrary', 'Library<i></i>')?>
      <ul id="menu2">
        <li><?php echo anchor('elibrary/category/report', 'Report')?></li>
        <li><?php echo anchor('elibrary/category/research', 'Research') ?></li>
        <li><?php echo anchor('elibrary/category/guideline', 'Guideline') ?></li>
        <li><?php echo anchor('elibrary/category/best-practice', 'Best Practice') ?></li>
        <li><?php echo anchor('elibrary/category/journal', 'Journal') ?></li>
      </ul>
    </li>
    <li><?php echo anchor('links', 'Links') ?></li>
    <li><?php echo anchor('contact', 'Contact') ?></li>
  </ul>
</nav>
