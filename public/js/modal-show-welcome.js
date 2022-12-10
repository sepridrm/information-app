$(function () {
    $(document).on('click', "#create-item", function () {
        $(this).addClass('create-item-trigger-clicked');
        $('#modal_cu').modal('show');
    })
    $(document).on('click', "#update-item", function () {
        $(this).addClass('create-item-trigger-clicked');
        $('#modal_cu').modal('show');
    })
    $('#modal_cu').on('show.bs.modal', function () {
        var el = $(".create-item-trigger-clicked");
        if (el.data('title') == "create") {
            $("#modal_cu .modal-title").text("Tambah Welcome");
            $("#modal_cu #name").val("");
            $("#modal_cu #nama_file").attr("hidden", true);
            $("#modal_cu #id").val("");
        } else {
            var id = el.data('id');
            var nama = el.data('nama');
            var file = el.data('path');
            $("#modal_cu .modal-title").text("Ubah Welcome");
            $("#modal_cu #name").val(nama);
            $("#modal_cu #nama_file").attr("hidden", false);
            $("#modal_cu #nama_file").val(file);
            $("#modal_cu #id").val(id);
        }
    })
    $('#modal_cu').on('hide.bs.modal', function () {
        $('.create-item-trigger-clicked').removeClass('create-item-trigger-clicked')
        $("#modal_cu").trigger("reset");
    })


    $(document).on('click', "#change-item", function () {
        $(this).addClass('change-item-trigger-clicked');
        $('#modal-change').modal('show')
    })
    $('#modal-change').on('show.bs.modal', function() {
        var el = $(".change-item-trigger-clicked");
        var row = el.closest(".data-row");

        var id = el.data('id');
        var st = el.data('st');
        var menu = el.data("menu");
        var nama = el.data("nama");
        var status = el.data("status");

        $("#id_change").val(id);
        $("#st").val(st);
        $("#status_change").val(status);
        $("#modal-change .modal-title").text("Ubah Status Welcome");
        $("#modal-change .isi").text("Apakah anda yakin ingin mengubah Welcome" + nama +
            " ini menjadi " + status + " ?");

    })
    $('#modal-change').on('hide.bs.modal', function() {
        $('.change-item-trigger-clicked').removeClass('change-item-trigger-clicked')
        $("#modal-change").trigger("reset");
    })

    $(document).on('click', "#delete-item", function () {
        $(this).addClass('delete-item-trigger-clicked');
        $('#modal-delete').modal('show')
    })
    $('#modal-delete').on('show.bs.modal', function () {
        var el = $(".delete-item-trigger-clicked");

        var id = el.data('id');
        var nama = el.data("nama");

        $("#modal-delete #id").val(id);
        $("#modal-delete .modal-title").text("Hapus Welcome");
        $("#modal-delete .isi").text("Apakah anda yakin ingin menghapus Welcome " + nama +
            " ini ?");

    })
    $('#modal-delete').on('hide.bs.modal', function () {
        $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
        $("#modal-delete").trigger("reset");
    })
})