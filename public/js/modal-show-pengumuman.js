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
            $("#modal_cu .modal-title").text("Tambah Pengumuman");
            $("#modal_cu #isi").val("");
            $("#modal_cu #id").val("");
        } else {
            var id = el.data('id');
            var isi = el.data('isi');
            $("#modal_cu .modal-title").text("Ubah Pengumuman");
            $("#modal_cu #isi").val(isi);
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
        
        var id = el.data('id');
        var st = el.data('st');
        var nama = el.data("nama");
        var status = el.data("status");

        $("#id").val(id);
        $("#st").val(st);
        $("#status_change").val(status);
        $("#modal-change .modal-title").text("Ubah Status Pengumuman");
        $("#modal-change .isi").text("Apakah anda yakin ingin mengubah " + nama +
            " menjadi " + status + " ?");

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
        $("#modal-delete .modal-title").text("Hapus Pengumuman");
        $("#modal-delete .isi").text("Apakah anda yakin ingin menghapus " + nama +
            " ?");

    })
    $('#modal-delete').on('hide.bs.modal', function () {
        $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
        $("#modal-delete").trigger("reset");
    })
})