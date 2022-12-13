<div id="modal-pangkat" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Naik Pangkat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="pangkatForm" name="pangkatForm">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="isi"></div>
                        <input type="hidden" name="id" id="id">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="pangkat">Pangkat</label>
                                <select name="pangkat" id="pangkat" class="form-control" style="width:100%;">
                                    @foreach ($pangkat as $item)
                                        <option value='{{ $item->id }}'>{{ $item->nama ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" id="pangkatsimpan" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
