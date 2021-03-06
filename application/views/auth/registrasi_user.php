<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>RKHI | Register</title>

</head>

<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b class="primary-color">Rumah Konsultasi Hukum Islam</a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg text-bold"> Silahkan isi data-data dibawah ini untuk Registrasi</p>
            <?php echo $message; ?>
            <?php
            echo form_open('admin/auth/register');
            ?>
            <div class="row form-group">
                <div class="col-lg-6">
                    <?php echo form_error('first_name') ?>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nama Depan">

                    </div>
                </div>
                <div class="col-lg-6">
                    <?php echo form_error('last_name') ?>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Nama Belakang">

                    </div>
                </div>
            </div>
            <?php echo form_error('username') ?>
            <div class="form-group has-feedback">
                <input type="text" name="username" id="username" class="form-control" placeholder="Nama Pengguna" />

            </div>
            <?php echo form_error('company') ?>
            <div class="form-group has-feedback">
                <input type="text" name="company" id="company" class="form-control" placeholder="Nama Perusahaan" />

            </div>
            <?php echo form_error('email') ?>
            <div class="form-group has-feedback">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" />

            </div>
            <?php echo form_error('password') ?>
            <div class="form-group has-feedback">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" />

            </div>
            <?php echo form_error('password_confirm') ?>
            <div class="form-group has-feedback">
                <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Ulangi Password" />

            </div>
            <div class="col-xs-8">

            </div>
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
                <?= anchor('admin/Auth', 'Kembali ke Laman Login', array('class' => 'btn btn-danger')) ?>
            </div>
            <?php echo form_close(); ?>
           

</body>

</html>