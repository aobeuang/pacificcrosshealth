<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel tile">
        <div class="x_title">
          <h2>Package Management</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <a href="<?php echo base_url('admin/package/add'); ?>" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Create Plan</a>
           <div class="clearfix"></div>

           <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <th>Plan</th>
              <th>Description</th>
              <th class="text-center col-md-1">visible</th>
              <th class="col-md-3"></th>
            </thead>
            <tbody>
              <?php if(!empty($plans)): ?>
              <?php foreach($plans as $pl): ?>
                <tr>
                  <td><?php echo $pl['plan_name'] ?></td>
                  <td><?php echo $pl['plan_description'] ?></td>
                    <td class="text-center"><input type="checkbox" data-id="<?php echo $pl['id']; ?>" name="chk_visible" <?php echo ( $pl['plan_visible'] ) ? "checked" : "" ?> value="1"></td>
                  <td>
                    <ul class="list-unstyled list-inline">
                      <li><a href="<?php echo $this_url; ?>/edit/<?php echo $pl['id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a></li>
                      <li><a href="#modal-<?php echo $pl['id']; ?>" data-toggle="modal" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a></li>
                    </ul>
                  </td>
                </tr>
              <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
           </table>
        </div>
      </div>
    </div>
</div>



<?php // delete modal ?>
<?php if ($plans) : ?>
    <?php foreach ($plans as $pl) : ?>
        <div class="modal fade" id="modal-<?php echo $pl['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-label-<?php echo $pl['id']; ?>" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 id="modal-label-<?php echo $pl['id']; ?>">Plan Delete</h4>
                    </div>
                    <div class="modal-body">
                        <p>Confirm Delete <?php echo $pl['plan_name']; ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger btn-delete-plan" data-id="<?php echo $pl['id']; ?>">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>