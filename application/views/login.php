<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-lg-6">
            <div class="card o-hidden border-5 border-white shadow-lg my-5 bg-card-log">
                <div class="card-body">
                    <div class="text-center">
                        <h5 class="card-title">
                            Petugas? Login!
                        </h5>
                    </div>
                    <form action="<?= base_url() ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username" value='<?= set_value('username'); ?>'>
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukan password" value='<?= set_value('password'); ?>'>
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-info btn-user btn-block">
                            Masuk
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>