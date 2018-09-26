<section class="content-header">
    <h1>
        <?php echo strtoupper(lang('deactivate_heading'));?>
        <small><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Seting</a></li>
        <li class="active"><?php echo lang('deactivate_heading');?></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                <div class="col-md-5">
                <?php echo form_open("auth/deactivate/".$user->id);?>
				  <p>
				  	<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
				    <input type="radio" name="confirm" value="yes" checked="checked" />
				    <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
				    <input type="radio" name="confirm" value="no" />
				  </p>

				  <?php echo form_hidden($csrf); ?>
				  <?php echo form_hidden(array('id'=>$user->id)); ?>

				  <p><?php echo form_submit('submit', lang('deactivate_submit_btn'));?></p>

				<?php echo form_close();?>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>