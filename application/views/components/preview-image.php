
<div class="col-xs-12 preview-image-wrapper">
  <div id="uploadedImage"

  <?php if (isset($image)) : ?>
    style="background-image: url(<?php echo base_url('uploads/') . $image; ?>);"
  <?php endif; ?>

  ></div>
  <div id="optimizedImage"

  <?php if (isset($preview)) : ?>
    style="background-image: url(<?php echo base_url('uploads/') . $preview; ?>);"
  <?php endif; ?>

  ></div>
</div><!-- .col-xs-12.col-sm-6 -->