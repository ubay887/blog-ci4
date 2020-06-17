<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    POST
                    <a href="<?php echo base_url('admin/post/create'); ?>" class="btn btn-primary btn-sm float-right">New Record</a>
                </div>
                <div class="card-body">

                    <?php if (session()->getFlashdata('success')) { ?>
                        <div class="alert alert-success">
                            <?php echo session()->getFlashdata('success'); ?>
                        </div>
                    <?php } ?>

                    <?php if (session()->getFlashdata('error')) { ?>
                        <div class="alert alert-danger">
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                    <?php } ?>



                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php if ($posts): ?>
                                <?php foreach ($posts as $post) { ?>
                                    <tr>
                                        <td><?php echo $post->title; ?></td>
                                        <td><?php echo ($post->status == 2) ? 'Publish':'Draft'; ?></td>
                                        <td><?= $post->created_at ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/post/edit/' . $post->id); ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="<?php echo base_url('admin/post/destroy/' . $post->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('kamu yakin?');">Delete</a>
                                        </td>
                                    </tr>

                                <?php } ?>
                                <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">No post found.</td>
                                </tr>

                                <?php endif; ?>
                        </tbody>
                    </table>

                    <?= $pager->links(); ?>
                </div>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('extra-js') ?>
<script>
    $(document).ready(function() {
        $('.pagination li').addClass('page-item');
        $('.pagination li a').addClass('page-link');
    })
</script>
<?= $this->endSection() ?>