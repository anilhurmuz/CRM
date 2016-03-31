 <form name="form_musteri_guncelle" id="form_musteri_guncelle" action="{{Request::root()}}/crm/kisi_yonetimi/update"
          class="form-horizontal tasi-form center-block" method="post">
        <input type="hidden" name="_token" id="my_token" value="<?= csrf_token();?>">
        <input type="hidden" name="xcmpcode" id="xcmpcode" value="{!! $xcmpcode !!}">
        <input type="hidden" class="contId" name="id" value="">
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Adı</label>
                    <div>
                        <div class="col-sm-5">
                            <input name="name" id="kisi_ekle_contact_name" type="text"
                                   class="form-control width-200">
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Soyadı</label>
                    <div>
                        <div class="col-sm-5">
                            <input name="surname" id="kisi_ekle_contact_surname" type="text"
                                   class="form-control width-200">
                        </div>

                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Firması</label>
                    <div class="col-sm-5">
                        <input name="account" id="kisi_ekle_contact_account" type="text"
                               class="form-control width-200">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Durumu</label>
                    <div class="col-sm-5">
                        <select name="status" id="kisi_ekle_account_contact_status"
                                class="form-control input-sm m-bot15"
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
                        <input name="title" id="kisi_ekle_account_contact_title" type="text"
                               class="form-control width-200">
                    </div>

                </div>

                <div class="form-group">

                    <div class="col-sm-5">

                        <button type="button" name="btn_kisi_islem" id="btn_kisi_islem"
                                class="btn-kisi-islem-margin-left btn btn-success" data-toggle="modal"
                                href="#myModal5"><i
                                    class="fa fa-plus"></i> İşlemler
                        </button>


                    </div>
                </div>

            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">İş Telefonu</label>
                    <div>
                        <div class="col-sm-5">
                            <input name="phone1" id="kisi_ekle_info_phone1" type="text"
                                   class="form-control width-200">
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Cep Telefonu</label>
                    <div>
                        <div class="col-sm-5">
                            <input name="phone2" id="kisi_ekle_info_phone2" type="text"
                                   class="form-control width-200">
                        </div>

                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Facebook</label>
                    <div class="col-sm-5">
                        <input name="facebook" id="kisi_ekle_info_facebook" type="text"
                               class="form-control width-200">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Twitter</label>
                    <div class="col-sm-5">
                        <input name="twitter" id="kisi_ekle_info_twitter" type="text"
                               class="form-control width-200">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">Linkedin</label>
                    <div class="col-sm-5">
                        <input name="linkedin" id="kisi_ekle_info_linkedin" type="text"
                               class="form-control width-200">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label width-150">E-Bülten</label>
                    <div class="col-sm-5">
                        <select name="bulletin" id="kisi_ekle_contact_bulletin"
                                class="form-control input-sm m-bot15"
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
                    <label class="col-sm-1 control-label width-150"
                           style="float: left">Açıklama</label>
                    <div>
                                                <textarea name="description" id="kisi_ekle_info_description" class="form-control"
                                                          style="width:500px; height: 280px; float: left;"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label width-150"></label>
                    <div class="col-sm-5 width-200">
                        <button name="btn_kisi_güncelle" id="btn_kisi_güncelle" type="submit"
                                class="btn-kisi-add-margin-left btn btn-warning">
                            Güncelle
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </form>