@section('tab')
    @parent

    <li class="" id="li_ekle">
        <a data-toggle="tab" href="#ekle" id="a_ekle">Ekle</a>
    </li>
@stop


@section('tabcontent')
    @parent
    <div id="ekle" class="tab-pane panel-body">

        <form name="form_musteri_ekle" id="form_musteri_ekle" class="form-horizontal tasi-form center-block" data-toggle="validator" role="form" method="post"
              action="{{Request::root()}}/crm/musteri_yonetimi/create">
            <input type="hidden" name="_token" id="my_token" value="<?= csrf_token();?>">
            <input type="hidden" name="xcmpcode" id="xcmpcode" value="{!! $xcmpcode !!}">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="acc_name" class="col-sm-1 width-150 control-label">Müşteri Kısa Adı</label>
                        <div class="col-sm-5">
                            <input name="name" type="text" id="acc_name" type="text" class="form-control" required>
                            <div class="help-block with-errors"></div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="acc_title" class="col-sm-1 width-150 control-label">Müşteri Ünvanı</label>
                        <div class="col-sm-5">
                            <input name="title" id="acc_title" type="text" class="form-control" required>
                            <div class="help-block with-errors"></div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="acc_status" class="col-sm-1 width-150 control-label">Durumu</label>
                        <div class="col-sm-5">
                            <select name="status" id="acc_status" class="form-control" required>
                                <option value="" disabled selected>Seçiniz</option>
                                <option value="aktif">Aktif</option>
                                <option value="pasif">Pasif</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="acc_industry" class="col-sm-1 control-label width-150">Sektörü</label>
                        <div class="col-sm-5">
                            <select name="industry" id="acc_industry" class="form-control" required>
                                <option value="" disabled selected>Seçiniz</option>
                                <option value="sektor1">Sektör 1</option>
                                <option value="sektor2">Sektör 2</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="acc_type" class="col-sm-1 width-150 control-label">Tipi</label>
                        <div class="col-sm-5">
                            <select name="type" id="acc_type" class="form-control" required>
                                <option value="" disabled selected>Seçiniz</option>
                                <option value="musteri">Müşteri</option>
                                <option value="potansiyel">Potansiyel Müşteri</option>
                                <option value="muhtemel">Muhtemel Aday</option>
                            </select>
                        </div>
                    </div>


                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="acc_taxoff" class="col-sm-1 width-150 control-label">Vergi Dairesi</label>
                        <div class="col-sm-5">
                            <input name="taxoff" id="acc_taxoff" type="text" class="form-control" required>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="acc_taxno" class="col-sm-1 width-150 control-label">Vergi Numarası</label>
                        <div class="col-sm-5">
                            <input name="taxno" type="text" id="acc_taxno" required pattern="[0-9]{10}" title="Lütfen 10 haneli bir vergi numarası giriniz!" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="acc_acccode" class="col-sm-1 width-150 control-label">Muh. Kodu</label>
                        <div class="col-sm-5">
                            <input name="acccode" id="acc_acccode" type="number" class="form-control" required pattern="[0-9]{10}" title="Lütfen 10 haneli bir muhasebe kodu giriniz!">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label width-150"></label>
                        <div class="col-sm-5">

                            <input name="btn_musteri_ekle" id="btn_musteri_ekle" type="submit" class="btn-add-margin-left btn btn-success">
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
@stop