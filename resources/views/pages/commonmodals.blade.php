
@section('modalRemove')
    @parent
    <div class="modal fade modal-dialog-center" id="musteri_modal_sil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content-wrap">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Müşteri Sil</h4>
                    </div>
                    <div id="modal_delete_body">



                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button class="btn btn-warning" type="button" id="modal_delete"> Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop