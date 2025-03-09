<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="user_id">
                <div class="form-group">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" class="form-control" id="name-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name"></div>
                </div>


                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input type="text" class="form-control" id="email-edit" rows="4">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-email"></div>
                </div>


                <div class="form-group">
                    <label for="name" class="control-label">Password</label>
                    <input type="password" class="form-control" id="password-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-password"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Role</label>
                    <select class="form-select" id="role-edit" name="role">
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
                <button type="button" class="btn btn-primary" id="update">UPDATE</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create user event
    $('body').on('click', '#btn-edit-user', function () {
    let user_id = $(this).data('id');

    // Fetch user detail with AJAX
    $.ajax({
        url: `/user-management/${user_id}`,
        type: "GET",
        cache: false,
        success:function(response){
            // Fill form fields with user data
            $('#user_id').val(response.data.id);
            $('#name-edit').val(response.data.name);
            $('#email-edit').val(response.data.email);
            $('#role-edit').val(response.data.role);

            // Open modal
            $('#modal-edit').modal('show');
        }
    });
});

    //action update user
    $('#update').click(function(e) {
        e.preventDefault();

        //define variable
        let user_id = $('#user_id').val();
        let name   = $('#name-edit').val();
        let email   = $('#email-edit').val();
        let password   = $('#password-edit').val();
        let role = $('#role-edit').val();
        let token   = $("meta[name='csrf-token']").attr("content");

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
    
        
        let formData = new FormData();
        formData.append('name',name);
        formData.append('email',email);
        formData.append('password',password);
        formData.append('role', role);
        formData.append('_token',token);
        formData.append('_method', 'PUT');
        
        $.ajax({

            url: `/user-management/${user_id}`,
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            
            success:function(response){

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
                        <td class="text-center">
                        <a href="javascript:void(0)" id="btn-edit-user" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                        <a href="javascript:void(0)" id="btn-delete-user" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                        </tr>
                        `;
                        
                        //append to user data
                        $(`#index_${response.data.id}`).replaceWith(user);
                        
                        //close modal
                        $('#modal-edit').modal('hide');
                        
                        
                    },
                    error: function(xhr, status, error) {
                console.log(xhr.responseText); // Tampilkan pesan kesalahan dalam konsol
            }
                    // error:function(error){
                        
            //     if(error.responseJSON.title[0]) {

            //         //show alert
            //         $('#alert-title-edit').removeClass('d-none');
            //         $('#alert-title-edit').addClass('d-block');

            //         //add message to alert
            //         $('#alert-title-edit').html(error.responseJSON.title[0]);
            //     } 

            //     if(error.responseJSON.content[0]) {

            //         //show alert
            //         $('#alert-content-edit').removeClass('d-none');
            //         $('#alert-content-edit').addClass('d-block');

            //         //add message to alert
            //         $('#alert-content-edit').html(error.responseJSON.content[0]);
            //     } 

            // }

        });

    });

</script>