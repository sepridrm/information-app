<div id="modal-change" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="changeForm" name="changeForm">
                    {{ csrf_field() }}
                    @method('patch')
                    <div class="card-body">
                        <div class="isi"></div>
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="st" id="st">
                        <input type="hidden" name="status_change" id="status_change">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btnchange" class="btn btn-primary">Ubah</button>
            </div>
        </div>
    </div>
</div>
