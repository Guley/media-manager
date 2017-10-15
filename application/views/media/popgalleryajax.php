 <div class="row">
                    <?php 
                    $i=0;
                    foreach ($mediaList as $media){ 
                          if($i%5==0){
                            echo '</div>';
                            echo '<div class="row">';
                            $i=0;
                           }
                        ?>
                    <div class="col-xs-12 col-sm-2" id="<?php echo 'm_'.$media['media_id']; ?>"><label for="fileToUpload"<?php echo $media['media_id']; ?>><img src="<?php echo JB_WEBSITE_URL.'uploads/'.$media['path'].'/small/'.$media['filename'];  ?>" class="img-responsive thumb" data-cdn="<?php echo JB_WEBSITE_URL; ?>" data-url="<?php echo base_url('media/singlemedia/'); ?>" data-id="<?php echo $media['media_id']; ?>" /></label><input type="radio" name="myfile" value="<?php echo $media['media_id']; ?>" id="fileToUpload<?php echo $media['media_id']; ?>" autocomplete="off" class="hidden checkbix "  /> <a href="javascript:void(0);" data-url="<?php echo base_url('media/remove/'.$media['media_id']); ?>" class="text-danger-600 confirmation"><i class="icon-trash btn btn-danger btn-xs"></i></a></div>
                    
                    <?php $i++; } ?>
             
            </div>
<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3 col-sm-offset-3 "><?php echo $this->ajax_pagination->create_links(); ?></div>          