<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" class="form-control" id="name">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name"></div>
                </div>


                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input type="text" class="form-control" id="email" rows="4">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-email"></div>
                </div>


                <div class="form-group">
                    <label for="name" class="control-label">Password</label>
                    <input type="password" class="form-control" id="password">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-password"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Role</label>
                    <select class="form-select" id="role" name="role">
                        <option value="" selected disabled>Select Role</option>
                        <option value="0">User</option>
                        <option value="1">admin</option>
                        <!-- Tambahkan opsi lain sesuai dengan peran yang Anda perlukan -->
                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-role"></div>
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
    //button create user event
    $('body').on('click', '#btn-create-user', function() {

        //open modal
        $('#modal-create').modal('show');
    });

    //action create user
    $('#store').click(function(e) {
        e.preventDefault();

        //define variable
        let name = $('#name').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let role = $('#role').val();
        // let image = $('#image')[0].files[0];
        let token = $("meta[name='csrf-token']").attr("content");

        var formData = new FormData();
        formData.append('name', name);
        formData.append('email', email);
        formData.append('password', password);
        formData.append('role', role);
        // formData.append('image', image);
        formData.append('_token', token);


        //ajax
        $.ajax({

            url: `/user-management`,
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            // data: {
            //     "name": name,
            //     "email": email,
            //     "image": image,
            //     "password": password,
            //     "role": role,
            //     "_token": token
            // },
            success: function(response) {

                //show success message
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                //data user
                let user = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.name}</td>
                        <td>${response.data.email}</td>
                        <td>${response.data.password}</td>
                        <td>${response.data.role}</td>
                        <td>${response.data.crated_at}</td>
                        <td class="text-center">
                                        <a href="javascript:void(0)"  id="btn-edit-user" data-id="${response.data.id}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                            <i class="fas fa-edit text-secondary"></i>
                                        </a>
                                        <span>
                                            <a href="javascript:void(0)"  id="btn-delete-user" data-id="${response.data.id}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Delete user">
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </a>
                                        </span>
                                    </td>
                    </tr>
                `;

                //append to table
                $('#table-users').prepend(user);

                //clear form
                $('#name').val('');
                $('#email').val('');
                $('#password').val('');
                $('#role').val('');
                $('#image').val('');


                //close modal
                $('#modal-create').modal('hide');


            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText); // Tampilkan pesan kesalahan dalam konsol
            }
            // error:function(error){

            //     if(error.responseJSON.title[0]) {

            //         //show alert
            //         $('#alert-title').removeClass('d-none');
            //         $('#alert-title').addClass('d-block');

            //         //add message to alert
            //         $('#alert-title').html(error.responseJSON.title[0]);
            //     } 

            //     if(error.responseJSON.content[0]) {

            //         //show alert
            //         $('#alert-content').removeClass('d-none');
            //         $('#alert-content').addClass('d-block');

            //         //add message to alert
            //         $('#alert-content').html(error.responseJSON.content[0]);
            //     } 

            // }

        });

    });
</script>