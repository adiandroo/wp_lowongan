<div id="success_message" class="alert alert-success" style="display: none"></div>
<form id="enquiry">
    <h2>Form aplikasi pelamar untuk posisi <?php the_title() ?></h2>
    <input type="hidden" name="registration" value="<?php the_field('registration'); ?>">
    <div class="form-group row">
        <div class="col-lg-6">
            <input type="text" name="fname" placeholder="Nama Depan" required>
        </div>
        <div class="col-lg-6">
            <input type="text" nama="lname" placeholder="Nama Belakang" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class=col-lg-6>
            <input type="tel" name="phone" placeholder="Nomor Telepon" required>
        </div>
    </div>
    <div class="form-group">
        <textarea name="enquiry" class="form-control" placeholder="Ceritakan Tentang Diri Anda..." required></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-block">Kirim Lamaran</button>
    </div>
    </div>
</form>

<script>
    (function($) {
        $('#enquiry').submit(function(event) {
            event.preventDefault();
            var endpoint = '<?php echo admin_url('admin-ajax.php'); ?>';
            var form = $('#enquiry').serialize();
            var formdata = new FormData;
            formdata.append('action', 'enquiry');
            formdata.append('enquiry', form);
            $.ajax(endpoint, {
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(res) {
                    $('#enquiry').fadeOut(200);
                    $('#success_message').text('Thanks').show();
                },
                error: function(err) {
                    alert(err.responseJSON.data);
                }
            })
        })
    })(jQuery)
</script>