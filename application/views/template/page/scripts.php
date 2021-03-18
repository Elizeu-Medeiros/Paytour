<!--   Core JS Files   -->
<script src="<?= base_url() ?>assets/js/jquery.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/js/material.min.js"></script>

<!--    Plugin for Date Time Picker and Full Calendar Plugin   -->
<script src="<?= base_url() ?>assets/js/moment.min.js"></script>

<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/   -->
<script src="<?= base_url() ?>assets/js/nouislider.min.js" type="text/javascript"></script>

<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker   -->
<script src="<?= base_url() ?>assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js" type="text/javascript"></script>

<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select   -->
<script src="<?= base_url() ?>assets/js/bootstrap-selectpicker.js" type="text/javascript"></script>

<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/   -->
<script src="<?= base_url() ?>assets/js/bootstrap-tagsinput.js"></script>

<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput   -->
<script src="<?= base_url() ?>assets/js/jasny-bootstrap.min.js"></script>


<!--    Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc    -->
<script src="<?= base_url() ?>assets/js/material-kit.js?v=1.3.0" type="text/javascript"></script>

<?= @$maps ?>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?php if (isset($scripts)) {
  foreach ($scripts as $script_name) {
    $src = base_url() . "assets/js/" . $script_name; ?>
    <script src="<?= $src ?>"></script>
<?php }
} ?>

<script type="text/javascript">
  $(function() {
    $('#datetimepicker12').datetimepicker({
      inline: true,
      locale: 'pt-br'
    });
  });
</script>

</html>