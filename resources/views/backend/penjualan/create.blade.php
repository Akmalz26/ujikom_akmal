<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="pelanggan_id">Nama Pelanggan</label>
                    <select class="form-control" id="pelanggan_id" name="pelanggan_id">
                        <option value="">Pilih pelanggan</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                

                <div class="form-group">
                    <label class="control-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal"></textarea>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tanggal"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Total Harga</label>
                    <input type="number" class="form-control" id="total_harga">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-total_harga"></div>
                </div>

               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="store">SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create penjualan event
    $('body').on('click', '#btn-create-penjualan', function () {

        //open modal
        $('#modal-create').modal('show');
    });

    //action create penjualan
    $('#store').click(function(e) {
        e.preventDefault();

        //define variable
        let pelanggan_id   = $('#pelanggan_id').val();
        let tanggal = $('#tanggal').val();
        let total_harga = $('#total_harga').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/penjualan`,
            type: "POST",
            cache: false,
            data: {
                "pelanggan_id": pelanggan_id,
                "tanggal": tanggal,
                "total_harga": total_harga,
                "_token": token
            },
            success:function(response){

                //show success message
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                

                //data penjualan
                let penjualan = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.pelanggan_id}</td>
                        <td>${response.data.tanggal}</td>
                        <td>${response.data.total_harga}</td>
                        <td>${response.data.email}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-penjualan" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-penjualan" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;
                
                //append to table
                $('#table-penjualans').prepend(penjualan);
                
                //clear form
                $('#pelanggan_id').val('');
                $('#tanggal').val('');
                $('#total_harga').val('');

                //close modal
                $('#modal-create').modal('hide');
                

            },

            // error: function (error) {
            //     // Tampilkan pesan kesalahan validasi atau email sudah ada
            //     var errors = error.responseJSON.errors;
            //     if ('email' in errors) {
            //         Swal.fire({
            //             icon: 'error',
            //             title: 'Oops...',
            //             text: 'Email sudah ada dalam basis data.',
            //         });
            //     } else {
            //         $.each(errors, function (key, value) {
            //             Swal.fire({
            //                 icon: 'error',
            //                 title: 'Oops...',
            //                 text: value[0],
            //             });
            //         });
            //     }

                
            // }
            // error:function(error){
                
            //     if(error.responseJSON.pelanggan_id[0]) {

            //         //show alert
            //         $('#alert-pelanggan_id').removeClass('d-none');
            //         $('#alert-pelanggan_id').addClass('d-block');

            //         //add message to alert
            //         $('#alert-pelanggan_id').html(error.responseJSON.pelanggan_id[0]);
            //     } 

            //     if(error.responseJSON.tanggal[0]) {

            //         //show alert
            //         $('#alert-tanggal').removeClass('d-none');
            //         $('#alert-tanggal').addClass('d-block');

            //         //add message to alert
            //         $('#alert-tanggal').html(error.responseJSON.tanggal[0]);
            //     } 

            //     if(error.responseJSON.total_harga[0]) {

            //         //show alert
            //         $('#alert-total_harga').removeClass('d-none');
            //         $('#alert-total_harga').addClass('d-block');

            //         //add message to alert
            //         $('#alert-total_harga').html(error.responseJSON.total_harga[0]);
            //     } 

            //     if(error.responseJSON.email[0]) {

            //         //show alert
            //         $('#alert-email').removeClass('d-none');
            //         $('#alert-email').addClass('d-block');

            //         //add message to alert
            //         $('#alert-email').html(error.responseJSON.email[0]);
            //     } 

            // }

        });

    });

</script>