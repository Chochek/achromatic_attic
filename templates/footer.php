<footer class="content-info" role="contentinfo">
  <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
    <p>Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved. // design&code nibbled by <a class="bytepanda-logo" href="http://bytepanda.io" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/bytepanda-logo.svg" scale="0"></a></p>
  </div>
</footer>

<?php wp_footer(); ?>
