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

@section('modalUpdate')
    @parent

    @stop

@section('modalAccountAddress')
    @parent
<div class="modal fade modal-dialog-center" id="modalAccountAddress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="custom-modal-content">

            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-grey ">
                    Müşteri Adresi Ekleme
                </header>
                <div class="tab-pane active panel-body">
                    <form name="form_islem_müsteri_adresi" id="form_islem_müsteri_adresi"
                          class="form-horizontal tasi-form center-block" method="post" >
                        <input type="hidden" name="_token" id="my_token" value="<?= csrf_token();?>">
                        <input type="hidden" name="xcmpcode" id="xcmpcode" value="{!! $xcmpcode !!}">
                        <input type="hidden" class="accId" name="id" value="" >
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150">Adres Türü </label>
                                    <div>
                                        <select name="type" id="info_type" class="form-control input-sm m-bot15"
                                                style="width:200px; float: left;">
                                            <option value="" disabled selected>Seçiniz</option>
                                        </select>

                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150">Durumu </label>
                                    <div>
                                        <select name="status" id="info_status"
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
                                        <textarea name="address" id="info_address" class="form-control" style="width:200px; height: 80px; float: left;"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150">İl </label>
                                    <div>
                                        <select name="citycode" id="info_citycode" onchange="onCityChanged()" class="form-control input-sm m-bot15"
                                                style="width:200px; float: left;">
                                            <option value="" disabled selected>Seçiniz</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150">İlçe </label>
                                    <div>
                                        <select name="countycode" id="info_countycode"
                                                class="form-control input-sm m-bot15"
                                                style="width:200px; float: left;">
                                            <option value="" disabled selected>Seçiniz</option>
                                        </select>

                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150">Posta Kodu</label>
                                    <div>
                                        <input name="zipcode" id="info_zipcode" type="text" class="form-control width-200">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150">Telefon-1</label>
                                    <div>
                                        <div class="col-sm-5">

                                            <input name="phone1" id="info_phone1"  type="text" placeholder="" data-mask="(999) 999-9999" class="form-control width-200">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150">Telefon-2</label>
                                    <div>
                                        <div class="col-sm-5">
                                            <input name="phone2" id="info_phone2" type="text" class="form-control width-200">
                                        </div>

                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150">WEB</label>
                                    <div class="col-sm-5">
                                        <input name="web" id="info_web" type="text" class="form-control width-200">
                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150">Vergi Dairesi</label>
                                    <div class="col-sm-5">
                                        <input name="taxoff" id="info_taxoff" type="text" class="form-control width-200">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150">Vergi Numarası</label>
                                    <div class="col-sm-5">
                                        <input name="taxno" id="info_taxno" type="text" class="form-control width-200">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150">Muh. Kodu</label>
                                    <div class="col-sm-5">
                                        <input name="acccode" id="info_acccode" type="text" class="form-control width-200">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150"></label>

                                    <div class="col-sm-5">
                                        <button name="btn_islem_musteri_adres_ekle" id="btn_islem_musteri_adres_ekle" type="submit"
                                                class="margin-left-15 margin-top-15 btn btn-success width-150">Ekle
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label width-150"></label>

                                    <div class="col-sm-5">
                                        <button data-dismiss="modal" class="btn btn-danger margin-left-15 margin-top-15 width-150" type="button">Close</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>

            </section>
        </div>

    </div>
</div>
    @stop

@section('modalAccountContact')
    @parent
    <div class="modal fade modal-dialog-center" id="modalAccountContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="custom-modal-content">

                <section class="panel">
                    <header class="panel-heading tab-bg-dark-navy-grey ">
                        Kişi Ekleme
                    </header>
                    <div class="tab-pane active panel-body">
                        <form name="form_islem_müsteri_adresi" action="{{Request::root()}}/crm/musteri_yonetimi/ekle_kisi"
                              class="form-horizontal tasi-form center-block" method="post">
                            <input type="hidden" name="_token" id="my_token" value="<?= csrf_token();?>">
                            <input type="hidden" name="xcmpcode" id="xcmpcode" value="{!! $xcmpcode !!}">
                            <input type="hidden" class="accId" name="id" value="" >
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label width-150">Adı</label>
                                        <div>
                                            <div class="col-sm-5">
                                                <input name="name" id="contact_name" type="text" class="form-control width-200">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label width-150">Soyadı</label>
                                        <div>
                                            <div class="col-sm-5">
                                                <input name="surname" id="contact_surname" type="text" class="form-control width-200">
                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label width-150">Firması</label>
                                        <div class="col-sm-5">
                                            <input name="account" id="contact_campaigncode" type="text" class="form-control width-200">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label width-150">Durumu</label>
                                        <div class="col-sm-5">
                                            <select name="status" id="info_status" class="form-control input-sm m-bot15"
                                                    style="width:200px; float: left;">
                                                <option value="" disabled selected>Seçiniz</option>
                                                <option value="Çalışan">Çalışan</option>
                                                <option value="Ayrılmış">Ayrılmış</option>
                                            </select>

                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label width-150">Ünvanı</label>
                                        <div class="col-sm-5">
                                            <input name="title" id="contact_campaigncode" type="text" class="form-control width-200">
                                        </div>

                                    </div>

                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label width-150">İş Telefonu</label>
                                        <div>
                                            <div class="col-sm-5">
                                                <input name="phone1" id="info_phone1" type="text" class="form-control width-200">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label width-150">Cep Telefonu</label>
                                        <div>
                                            <div class="col-sm-5">
                                                <input name="phone2" id="info_phone2" type="text" class="form-control width-200">
                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label width-150">Facebook</label>
                                        <div class="col-sm-5">
                                            <input name="facebook" id="info_facebook" type="text" class="form-control width-200">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label width-150">Twitter</label>
                                        <div class="col-sm-5">
                                            <input name="twitter" id="info_twitter" type="text" class="form-control width-200">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label width-150">Linkedin</label>
                                        <div class="col-sm-5">
                                            <input name="linkedin" id="info_linkedin" type="text" class="form-control width-200">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label width-150">E-Bülten</label>
                                        <div class="col-sm-5">
                                            <select name="bulletin" id="bulletin" class="form-control input-sm m-bot15"
                                                    style="width:200px; float: left;">
                                                <option value="" disabled selected>Seçiniz</option>
                                                <option value="evet">Evet</option>
                                                <option value="hayır">Hayır</option>
                                                <option value="reddetti">Kişi Reddetti</option>
                                            </select>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label width-150" style="float: left">Açıklama</label>
                                        <div>
                                            <textarea name="description" id="info_address" class="form-control" style="width:500px; height: 280px; float: left;"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label width-150"></label>
                                        <div class="col-sm-5 width-200">
                                            <button type="submit" class="btn-kisi-add-margin-left btn btn-success">Ekle
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label width-150"></label>
                                        <div class="col-sm-5 width-200">
                                            <button data-dismiss="modal" class="btn btn-danger btn-kisi-add-margin-left">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>

        </div>
    </div>
    @stop