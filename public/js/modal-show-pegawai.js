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
            $("#modal_cu .modal-title").text("Tambah Pegawai");
            $("#modal_cu #name").val("");
            $("#modal_cu #jabatan").val("");
            $("#modal_cu #pangkat").attr("hidden", false);
            $("#modal_cu #nama_file").attr("hidden", true);
            $("#modal_cu #id").val("");
        } else {
            var id = el.data('id');
            var nama = el.data('nama');
            var jabatan = el.data('jabatan');
            var file = el.data('foto');
            $("#modal_cu .modal-title").text("Ubah Pegawai");
            $("#modal_cu #name").val(nama);
            $("#modal_cu #jabatan").val(jabatan);
            $("#modal_cu #pangkat").attr("hidden", true);
            $("#modal_cu #nama_file").attr("hidden", false);
            $("#modal_cu #nama_file").val(file);
            $("#modal_cu #id").val(id);
        }
    })
    $('#modal_cu').on('hide.bs.modal', function () {
        $('.create-item-trigger-clicked').removeClass('create-item-trigger-clicked')
        $("#modal_cu").trigger("reset");
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
        $("#modal-delete .modal-title").text("Hapus Pegawai");
        $("#modal-delete .isi").text("Apakah anda yakin ingin menghapus Gambar " + nama +
            " ini ?");

    })
    $('#modal-delete').on('hide.bs.modal', function () {
        $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
        $("#modal-delete").trigger("reset");
    })
})