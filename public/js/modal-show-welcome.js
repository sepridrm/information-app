$(function () {
    $(document).on('click', "#update-item", function () {
        $(this).addClass('create-item-trigger-clicked');
        $('#modal_cu').modal('show');
    })
    $('#modal_cu').on('show.bs.modal', function () {
        var el = $(".create-item-trigger-clicked");
        
        var id = el.data('id');
        var isi = el.data('isi');
        $("#modal_cu .modal-title").text("Ubah Welcome");
        $("#modal_cu #isi").val(isi);
        $("#modal_cu #id").val(id);
        
    })
    $('#modal_cu').on('hide.bs.modal', function () {
        $('.create-item-trigger-clicked').removeClass('create-item-trigger-clicked')
        $("#modal_cu").trigger("reset");
    })
})