<div class="content">
    <div class="row">
            <?php echo form_open('',['class'=>"form-horizontal"]); ?>
                <div class="form-group">
                <label class="control-label col-sm-2" for="email">Sample Name:</label>
                <div class="col-sm-10">
                  <input type="text" name="sample_name"  class="form-control" id="sample_name" placeholder="Enter Sample Name" value="<?php echo set_value('sample_name');?>">
                </div>
              </div>
              <div class="form-group">
                    <label class="control-label col-lg-2">&nbsp;</label>
                    <div class="col-lg-10">
                        
                        <button type="button" onclick="loadUploaderWithGallery('.txt_container', 'media_id', 'single')" class="btn btn-primary btn-icon btn-rounded"><i class="icon-upload"></i></button>
                        
                        <div class="row txt_container">
                            <?php echo form_input($form['media_id']);  ?>
                        </div>
                        <div class="row selected_images">
                          <div class="row selected_images">
                            <?php if(!empty($product_pic_info)){ ?>
                                <div class="col-lg-2 col-sm-3 img_<?php echo $product_pic_info['media_id']; ?>" >
                                    <div class="thumbnail">
                                        <div class="thumb">
                                            <img src="<?php echo $product_pic_info['base_url'].'small/'.$product_pic_info['file_name']; ?>" alt="">
                                            <div class="caption-overflow">
                                                <span><a href="javascript:void(0);" class="btn border-white text-white btn-flat btn-icon btn-rounded" onclick="removeImg(<?php echo $product_pic_info['media_id']; ?>, 'single', '.txt_container', 'media_id')" ><i class="icon-trash"></i></a><h6 class="no-margin image_title" ><?php echo $product_pic_info['file_name']; ?></h6></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                        </div>
                        </div>
                    </div>
                </div>
              
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default" disabled="">Submit</button>
                </div>
              </div>
            <?php echo form_close(); ?>
       
       
    </div>
 </div>