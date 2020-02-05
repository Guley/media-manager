<div class="content">
    <?php echo form_input($form['media_id']);  ?>
    <div class="row selected_images"> </div>
    <div class="pull-right"><button type="button" onclick="loadUploaderWithGallery('.txt_container', 'media_test', 'single')" class="btn btn-primary btn-icon btn-rounded"><i class="icon-upload"></i></button> </div>
</div>

<div class="content">
    <div class="panel panel-flat">
                         
        <div class="table-responsive">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Module</th>
                        <th>Size</th>
                        <th>Created</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($mediaData){
                        foreach($mediaData as $media){ ?>
                    <tr>
                        <td><img src="<?php echo $media['base_url'].'/small/'.$media['file_name'];  ?>" class="img-responsive thumb" data-cdn="<?php echo CDN_PATH; ?>" data-url="<?php echo base_url('media/singlemedia/'); ?>" data-id="" /></td>
                        <td><?php echo $media['original_name']; ?></td>
                        <td><?php echo $media['module']; ?></td>
                        <td><?php echo $media['file_size']; ?></td>
                        <td><?php echo dateformat($media['created'], 'datetime'); ?></td>
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="text-danger-600"><a onclick="confirmDelete('<?php echo base_url('media/delete/'.$media['media_id']); ?>')" ><i class="icon-trash"></i></a></li>
                            </ul>
                        </td>
                    </tr>
                    <?php }
                    } else { ?>
                    <tr>
                        <td colspan="5" >
                            <div class="alert alert-warning">No media file added yet.</div>
                        </td>
                    </tr>   
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center">
        <?php echo $this->pagination->create_links(); ?>
    </div>
         
 </div>