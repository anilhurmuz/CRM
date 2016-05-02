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
              role="form">
            <input type="hidden" name="_token" id="my_token" value="<?= csrf_token();?>">
            <input type="hidden" name="xcmpcode" id="xcmpcode" value="{!! $xcmpcode !!}">
            <div class="row">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label for="bulletin_name" class="col-sm-1 width-150 control-label">E-Bulten Adı :</label>
                        <div class="col-sm-7 width-300">
                            <input name="name" type="text" id="add_bulletin_name" type="text"
                                   class="form-control width-400">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="bulletin_date" class="col-sm-1 width-150 control-label">Açıklama :</label>
                        <div class="col-sm-7  width-300">
                            <textarea name="description" id="add_bulletin_description" class="form-control "
                                      style="width:400px; height: 100px; float: left; resize: none" required></textarea>
                        </div>
                    </div>

                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <label for="type" class="col-sm-1 width-150 control-label">E-Bülten Tipi :</label>
                        <div class="col-sm-7">
                            <select name="type" id="add_bulletin_type" class="form-control width-300" required>
                                <option value="" disabled selected>Seçiniz</option>
                                <option value="red">Kırmızı Bülten</option>
                                <option value="blue">Mavi Bülten</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bulletin_date" class="col-sm-1 width-150 control-label">Gönderim Başlangıç Tarihi
                            :</label>
                        <div class="col-sm-7">
                            <div class="input-group date form_datetime-componentStart" style="width: 273px;" data-link-field="form-datetime-start_inp" data-link-format="yyyy-mm-dd hh:ii">
                                <input id="add_bulletin_startdate" type="text" readonly="" size="16"
                                       class="form-control" required>
                                                <span class="input-group-btn add-on">
                                                <button type="button" class="btn btn-danger date-set"
                                                        style=" height: 35px; "><i class="fa fa-calendar"></i></button>
                                                </span>
                                <input name="startdate" type="hidden" id="form-datetime-start_inp" value="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="bulletin_date" class="col-sm-1 width-150 control-label">Gönderim Bitiş Tarihi
                            :</label>
                        <div class="col-sm-7">
                            <div class="input-group date form_datetime-componentEnd" style="width: 273px;" data-link-field="form-datetime-end_inp" data-link-format="yyyy-mm-dd hh:ii">
                                <input id="add_bulletin_enddate" type="text" readonly="" size="16"
                                       class="form-control" required>
                                                <span class="input-group-btn add-on">
                                                <button type="button" class="btn btn-danger date-set"
                                                        style=" height: 35px; "><i class="fa fa-calendar"></i></button>
                                                </span>
                                <input name="enddate" type="hidden" id="form-datetime-end_inp" value="">
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <input name="btn_bulletin_add" id="btn_bulletin_add" type="button"
                                   value="Ekle" class="btn btn-success btn_bulletin_add_margin">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div id="contacts" class="tab-pane active">
        <table id="contact-bulletin-add" class="display" width="100%"></table>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#add_bulletin_name").on('keyup', function () {
                var bulletinName = $("#add_bulletin_name").val();

                if (bulletinName == "" || bulletinName.length < 4) {
                    $("#add_bulletin_name").css('border', '3px #CCC solid');
                } else {

                    $.ajax({
                        type: "POST",
                        url: window.location + "/checkBulletinName",
                        data: {'data': bulletinName},
                        cache: false,
                        success: function (response) {
                            if (response == 1) {
                                $("#add_bulletin_name").css('border', '3px #C33 solid');
                                $("#add_bulletin_name").notify("Bülten adı zaten var.", {
                                    className: "error",
                                    position: "right",
                                    autoHideDelay: 3000
                                });
                            } else {
                                $("#add_bulletin_name").css('border', '3px #090 solid');
                                $("#add_bulletin_name").notify("Bülten Name is avaible.", {
                                    className: "success",
                                    position: "right",
                                    autoHideDelay: 3000
                                });
                            }
                        }
                    });
                }
            });
            $('#btn_bulletin_add').on('click', function () {
                if (!$('#form_bulletin_add').valid()) {
                    toastrMessage("Hata!", "Lütfen boş alanların hepsini doldurunuz!", "error");
                } else {
                    var formData = $('#form_bulletin_add').serializeArray();
                    $.ajax({
                        url: window.location + '/create',
                        type: 'POST',
                        data: formData,
                        success: function (response) {
                            if (response == 1) {
                                $("#add_bulletin_name").css('border', '3px #C33 solid');
                                $("#add_bulletin_name").notify("Bülten adı zaten var.", {
                                    className: "error",
                                    position: "right",
                                    autoHideDelay: 3000
                                });
                            } else {
                                toastrMessage("Başarılı!", "Kayıt işlemi başarıyla tamamlandı!", "success");
                            }
                        }, error: function () {
                            toastrMessage("Hata!", "Kayıt işlemi yapılamadı!", "error");
                        }
                    });
                }
            });
        });
    </script>
@stop
