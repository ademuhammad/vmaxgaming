<!-- Edit Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT DATA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="register_id">

                <div class="form-group">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" class="form-control" id="name-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                </div>
                

                <div class="form-group">
                    <label class="control-label">Number WA</label>
                    <input class="form-control" id="numberwa-edit" rows="4"></input>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-numberwa-edit"></div>
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
    // button edit register event
    $('body').on('click', '.btn-edit-register', function () {

        let register_id = $(this).data('id');

        // fetch detail register with ajax
        $.ajax({
            url: `/registers/${register_id}`,
            type: "GET",
            cache: false,
            success: function (response) {

                // fill data to form
                $('#register_id').val(response.data.id);
                $('#name-edit').val(response.data.name);
                $('#numberwa-edit').val(response.data.numberwa);

                // open modal
                $('#modal-edit').modal('show');
            }
        });
    });

    // action update register
    $('#update').click(function (e) {
        e.preventDefault();

        // define variables
        let register_id = $('#register_id').val();
        let name = $('#name-edit').val();
        let numberwa = $('#numberwa-edit').val();
        let token = $("meta[name='csrf-token']").attr("content");

        // ajax
        $.ajax({
            url: `/registers/${register_id}`,
            type: "PUT",
            cache: false,
            data: {
                "name": name,
                "numberwa": numberwa,
                "_token": token
            },
            success: function (response) {

                // show success message
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                // data register
                let register = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.name}</td>
                        <td>${response.data.numberwa}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-edit-register" data-id="${response.data.id}">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-register" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;

                // append to register data
                $(`#index_${response.data.id}`).replaceWith(register);

                // close modal
                $('#modal-edit').modal('hide');
            },
            error: function (error) {
                if (error.responseJSON.name[0]) {
                    // show alert
                    $('#alert-name-edit').removeClass('d-none');
                    $('#alert-name-edit').addClass('d-block');
                    // add message to alert
                    $('#alert-name-edit').html(error.responseJSON.name[0]);
                }

                if (error.responseJSON.numberwa[0]) {
                    // show alert
                    $('#alert-numberwa-edit').removeClass('d-none');
                    $('#alert-numberwa-edit').addClass('d-block');
                    // add message to alert
                    $('#alert-numberwa-edit').html(error.responseJSON.numberwa[0]);
                }
            }
        });
    });
</script>
