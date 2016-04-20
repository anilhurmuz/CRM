
<div id="modals-{{$rowInfo['parenttype']}}-{{$customerInfo['id']}}">
<div class="modal fade modal-dialog-center" id="modalAccountAddressEdit-{{$rowInfo['parenttype']}}-{{$customerInfo['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="custom-modal-content">

            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-blue ">
                    Müşteri Adresi Güncelleme
                </header>
                <div class="tab-pane active panel-body">
                    <form name="form_islem_müsteri_adresi" data-toggle="validator" role="form"
                          class="form-horizontal tasi-form center-block form-address">
                        <input name="parentid" type="hidden" value="{{$customerInfo['id']}}">
                        <input name="_token" type="hidden" value="<?= csrf_token();?>">
                        <input name="id" type="hidden" value="{{$rowInfo['id']}}">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group control-group">
                                    <label class="col-sm-1 width-150 control-label" >Adres Türü </label>
                                    <div>
                                        <select name="type" id="info_type-{{$rowInfo['id']}}"  class="form-control input-sm m-bot15"
                                                style="width:200px; float: left;" required>
                                            <option value="" disabled selected>Seçiniz</option>
                                            <option value="is_address">İş Adresi</option>
                                            <option value="ev_address">Ev Adresi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150">Durumu </label>
                                    <div>
                                        <select name="status" id="info_status-{{$rowInfo['id']}}"
                                        class="form-control input-sm m-bot15"
                                                style="width:200px; float: left;">
                                            <option value="" disabled selected>Seçiniz</option>
                                            <option value="aktif">Aktif</option>
                                            <option value="pasif">Pasif</option>
                                        </select>

                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150" style="float: left">Adresi </label>
                                    <div>
                                        <textarea name="address" id="info_address" class="form-control" style="width:200px; height: 80px; float: left;" required>
                                            {{$rowInfo['address']}}
                                        </textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150 control-label">İl </label>
                                    <div>
                                        <select name="citycode" class="info_citycode-{{$rowInfo['parenttype']}}-{{$rowInfo['id']}}"
                                        onchange="onCityChanged('info_citycode-{{$rowInfo['parenttype']}}-{{$rowInfo['id']}}','info_countycode-{{$rowInfo['parenttype']}}-{{$rowInfo['id']}}',0)" class="form-control input-sm m-bot15"
                                                style="width:200px; float: left;">
                                            <option value="" disabled selected>Seçiniz</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150">İlçe </label>
                                    <div>
                                        <select name="countycode" class="info_countycode-{{$rowInfo['parenttype']}}-{{$rowInfo['id']}}"
                                        class="form-control input-sm m-bot15"
                                                style="width:200px; float: left;">
                                            <option value="" disabled selected>Seçiniz</option>
                                        </select>

                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150">Posta Kodu</label>
                                    <div>
                                        <input name="zipcode" id="info_zipcode-{{$rowInfo['id']}}" type="text" value="{{$rowInfo['zipcode']}}" class="form-control width-200">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150">Telefon-1</label>
                                    <div>
                                        <div class="col-sm-5">
                                            <input name="phone1" id="info_phone1"  type="text" value="{{$rowInfo['phone1']}}" class="form-control width-200" required>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150">Telefon-2</label>
                                    <div>
                                        <div class="col-sm-5">
                                            <input name="phone2" id="info_phone2" type="text" value="{{$rowInfo['phone2']}}" class="form-control width-200" required>
                                        </div>

                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150">WEB</label>
                                    <div class="col-sm-5">
                                        <input name="web" id="info_web" type="text" value="{{$rowInfo['web']}}" class="form-control width-200" required>
                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150">Vergi Dairesi</label>
                                    <div class="col-sm-5">
                                        <input name="taxoff" id="info_taxoff" type="text" value="{{$rowInfo['taxoff']}}" class="form-control width-200" required>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150">Vergi Numarası</label>
                                    <div class="col-sm-5">
                                        <input name="taxno" id="info_taxno" type="text" value="{{$rowInfo['taxno']}}" class="form-control width-200" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150">Muh. Kodu</label>
                                    <div class="col-sm-5">
                                        <input name="acccode" id="info_acccode" type="text" value="{{$rowInfo['acccode']}}" class="form-control width-200" required>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150"></label>
                                    <div class="col-sm-5 width-200">
                                        <button name="btn_islem_musteri_adres_ekle"  type="button"
                                                class="btn-mus-adres-add-margin-left btn btn-success" id="btn_islem_musteri_adres_ekle">Güncelle
                                        </button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>

            </section>

            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
        $('body').on('click','#btn_islem_musteri_adres_ekle', function() {
            var a = $('#form_islem_müsteri_adresi').serializeArray();
            console.log(a);
            $.ajax({
                url:  'http://localhost/CRM/public/crm/musteri_yonetimi/edit_address',
                type: 'POST',
                data: a,
                success: function(data) {
                    toastrMessage("Başarılı!", "Güncelleme işlemi başarıyla tamamlandı!", "success");
                    $('#modalAccountAddressEdit-{{$rowInfo['parenttype']}}-{{$customerInfo['id']}}').modal('hide');
                }, error: function() {
                    toastrMessage("Hata!","İstediğiniz işlem yapılamadı!", "error");
                }
            });
        });
</script>