$(function () {
    $(document).on('click', "#update-item", function () {
        $(this).addClass('create-item-trigger-clicked');
        $('#modal_cu').modal('show');
    })
    $('#modal_cu').on('show.bs.modal', function () {
        var el = $(".create-item-trigger-clicked");
        if (el.data('title') == "create") {
            $("#modal_cu .modal-title").text("Tambah Video");
            $("#modal_cu #id").val("");
        } else {
            var id = el.data('id');
            var file = el.data('path');
            $("#modal_cu .modal-title").text("Ubah Video");
            $("#modal_cu #id").val(id);
        }
    })
    $('#modal_cu').on('hide.bs.modal', function () {
        $('.create-item-trigger-clicked').removeClass('create-item-trigger-clicked')
        $("#modal_cu").trigger("reset");
    })
})