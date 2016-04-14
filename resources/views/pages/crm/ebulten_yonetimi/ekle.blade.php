@section('tab')
    @parent

    <li class="" id="li_ekle">
        <a data-toggle="tab" href="#ekle" id="a_ekle">Ekle</a>
    </li>
@stop


@section('tabcontent')
    @parent
    <div id="ekle" class="tab-pane panel-body">
        <form name="form_bulletin_add" id="form_bulletin_add" class="form-horizontal tasi-form center-block"
              data-toggle="validator" role="form" method="post"
              action="{{Request::root()}}/crm/ebulten_yonetimi/create">
            <input type="hidden" name="_token" id="my_token" value="<?= csrf_token();?>">
            <input type="hidden" name="xcmpcode" id="xcmpcode" value="{!! $xcmpcode !!}">
            <input type="hidden" name="id" class="bulletinId" value="">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="bulletin_name" class="col-sm-1 width-150 control-label">E-Bulten Adı :</label>
                        <div class="col-sm-5">
                            <input name="name" type="text" id="add_bulletin_name" type="text"
                                   class="form-control width-200" required>
                            <div class="help-block with-errors"></div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="bulletin_date" class="col-sm-1 width-150 control-label">Gönderim Tarihi :</label>
                        <div class="col-sm-5  width-200">
                            <div class="date form_datetime-component">
                                <input name="todate" id="add_bulletin_date" type="text" readonly="" size="16"
                                       class="form-control">
                                                <span class="input-group-btn add-on">
                                                <button type="button" class="btn btn-danger date-set"
                                                        style=" height: 35px; "><i class="fa fa-calendar"></i></button>
                                                </span>
                            </div>

                        </div>

                    </div>



                    <div class="form-group">
                        <label for="type" class="col-sm-1 width-150 control-label">E-Bülten Tipi :</label>
                        <div class="col-sm-5">
                            <select name="type" id="add_bulletin_type" class="form-control" required>
                                <option value="" disabled selected>Seçiniz</option>
                                <option value="ebrosur" >Broşür</option>
                                <option value="info" >Bilgi Dökümanı</option>
                                <option value="referans" >Referans Dökümanı</option>
                                <option value="tecsolution" >Teknik Çözüm Dökümanı</option>
                                <option value="price" >Fiyat Listesi</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-1 control-label width-150">
                            <div>

                                <input name="url2" type="file" id="add_bulletin_file" class="default" >

                            </div>
                        </div>
                        <div class="col-sm-5">
                            <input name="btn_bulletin_add" id="btn_bulletin_add" type="submit"
                                   value="Ekle" class="btn btn-success margin-left-100-width">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div id="contacts" class="tab-pane active">

        <table id="contact-bulletin-add" class="display" width="100%"></table>

    </div>
@stop