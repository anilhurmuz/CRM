<form name="form_opportunity_update" id="form_opportunity_update" action="{{Request::root()}}/crm/satis_firsati_yonetimi/update"
      class="form-horizontal tasi-form center-block" method="post">
    <input type="hidden" name="_token" id="my_token" value="<?= csrf_token();?>">
    <input type="hidden" name="xcmpcode" id="xcmpcode" value="{!! $xcmpcode !!}">
    <input type="hidden" name="id" id="opportunity_update_id" value="{!! $id !!}">
    <input type="hidden" name="scope" id="opportunity_update_scope-{{$id}}">
    <div class="row">

        <div class="col-lg-3">
            <div class="form-group">
                <label class="col-sm-1 control-label width-150">Fırsat Adı </label>
                <div>
                    <div class="col-sm-5">
                        <input name="name" id="opportunity_update_name" type="text"
                               class="form-control width-200" required>
                    </div>

                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label width-150">Müşteri </label>
                <div>
                    <div class="col-sm-5 width-250">
                        <select name="accountid" id="opportunity_update_accountid"
                                class="form-control" required>
                            <option value="" disabled selected>Seçiniz</option>
                            @foreach($oppUpdateAccount as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

            </div>

            <div class="form-group">
                <label class="col-sm-1 control-label width-150">İş Ortağı </label>
                <div class="col-sm-5 width-250">
                    <select name="partnerid" id="opportunity_update_partnerid"
                            class="form-control" required>
                        <option value="" disabled selected>Seçiniz</option>
                        @foreach($oppUpdateAccount as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">

                <div class="col-sm-5">

                    <button data-toggle="dropdown" type="button" name="btn_opportunity_activity"
                            id="btn_opportunity_activity"
                            class="btn-add-margin-left btn btn-success opp-activity-width" aria-expanded="false">Aktivite Girişi <b
                                class="caret"></b></button>

                    <ul role="menu" class="dropdown-menu extended inbox">
                        <div class="notify-arrow notify-arrow-red"></div>
                        <li><a data-toggle="modal" href="#"></a></li>
                    </ul>

                </div>

            </div>

        </div>
        <div class="col-lg-3">

            <div class="form-group">
                <label class="col-sm-1 control-label width-150">Müşteri Yöneticisi </label>
                <div>
                    <div class="col-sm-5 width-250">
                        <select name="contactid" id="opportunity_update_contactid"
                                class="form-control" required>
                            <option value="" disabled selected>Seçiniz</option>
                            <option value="1" >Bedircan</option>
                            @foreach($oppUpdateContact as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label width-150">Kaynak Türü </label>
                <div>
                    <div class="col-sm-5 width-250">
                        <select name="leadid" id="opportunity_update_leadid"
                                class="form-control" required>
                            <option value="" disabled selected>Seçiniz</option>
                            @foreach($oppUpdateLead as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

            </div>

            <div class="form-group">
                <label class="col-sm-1 control-label width-150">Kaynak Detayı </label>
                <div class="col-sm-5 width-250">
                    <select name="campaignid" id="opportunity_update_campaignid"
                            class="form-control" required>
                        <option value="" disabled selected>Seçiniz</option>
                        <option value="1" >Kampanya</option>
                        @foreach($oppUpdateCampaign as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label class="col-sm-1 control-label width-150">Tahmini Bedeli </label>
                <div>
                    <div class="col-sm-5">
                        <input name="estimatedcost" id="opportunity_update_estimatedcost"
                               type="text"
                               class="form-control width-200" required>
                    </div>

                </div>
            </div>

            <div class="form-group">
                <label for="bulletin_date" class="col-sm-1 width-150 control-label">Tahmini Dönemi </label>
                <div class="col-sm-5  width-200">
                    <div data-date-viewmode="years" data-date-format="mm-yyyy" data-date=""
                         class="input-append date dpYears">
                        <input name="todate" id="opportunity_update_todate" type="text"
                               readonly="" size="16"
                               class="form-control">
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-danger" type="button" style=" height: 35px; "><i
                                                            class="fa fa-calendar"></i></button>
                                              </span>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label class="col-sm-1 control-label width-150">Durumu </label>
                <div>
                    <div class="col-sm-5 width-250">
                        <select name="status" id="opportunity_update_status"
                                class="form-control" required>
                            <option value="" disabled selected>Seçiniz</option>
                            <option value="bugun" >Bugün</option>
                        </select>
                    </div>

                </div>

            </div>

            <div class="form-group">
                <label class="col-sm-1 control-label width-150">Olasılığı </label>
                <div class="col-sm-5 width-250">
                    <select name="probability" id="opportunity_update_probability"
                            class="form-control" required>
                        <option value="" disabled selected>Seçiniz</option>
                        <option value="25" >%25</option>
                        <option value="50" >%50</option>
                        <option value="75" >%75</option>
                        <option value="99" >%99</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-1 control-label width-150"></label>
                <div class="col-sm-5 width-200">
                    <input name="btn_opportunity_update"
                            id="btn_opportunity_update" type="submit"
                            class="margin-left-100-width btn btn-success" value="Güncelle">
                </div>
            </div>
        </div>


    </div>

    <section class="panel" style="margin-top: 50px">
        <header class="panel-heading tab-bg-dark-navy-grey ">
            <ul class="nav nav-tabs bold">
                <li class="active">
                    <a data-toggle="tab" href="#div_scope">Kapsamı</a>
                </li>
                <li class="">
                    <a data-toggle="tab" href="#div_estimatedCost">Tahmini Bütçe</a>
                </li>
                <li class="">
                    <a data-toggle="tab" href="#div_estimatedPayment">Tahmini Ödeme Planı</a>
                </li>
                <li class="">
                    <a data-toggle="tab" href="#div_activity">Aktiviteler</a>
                </li>
            </ul>
        </header>
        <div class="panel-body">
            <div class="tab-content">
                <div id="div_scope" class="tab-pane active">

                    <div class="panel-body">
                        <div class="summernote" style="display: none;">Hello Summernote</div>
                        <div class="note-editor">
                            <div class="note-dropzone">
                                <div class="note-dropzone-message"></div>
                            </div>
                            <div class="note-dialog">
                                <div class="note-image-dialog modal" aria-hidden="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" aria-hidden="true" tabindex="-1">×
                                                </button>
                                                <h4 class="modal-title">Insert Image</h4></div>
                                            <form class="note-modal-form">
                                                <div class="modal-body">
                                                    <div class="form-group row-fluid note-group-select-from-files"><label>Select
                                                            from files</label><input class="note-image-input" type="file"
                                                                                     name="files" accept="image/*"
                                                                                     multiple="multiple"></div>
                                                    <div class="form-group row-fluid"><label>Image URL</label><input
                                                                class="note-image-url form-control span12" type="text">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button href="#" class="btn btn-primary note-image-btn disabled"
                                                            disabled="">Insert Image
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="note-link-dialog modal" aria-hidden="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" aria-hidden="true" tabindex="-1">×
                                                </button>
                                                <h4 class="modal-title">Insert Link</h4></div>
                                            <form class="note-modal-form">
                                                <div class="modal-body">
                                                    <div class="form-group row-fluid"><label>Text to display</label><input
                                                                class="note-link-text form-control span12" type="text">
                                                    </div>
                                                    <div class="form-group row-fluid"><label>To what URL should this link
                                                            go?</label><input class="note-link-url form-control span12"
                                                                              type="text"></div>
                                                    <div class="checkbox"><label><input type="checkbox" checked=""> Open in
                                                            new window</label></div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button href="#" class="btn btn-primary note-link-btn disabled"
                                                            disabled="">Insert Link
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="note-help-dialog modal" aria-hidden="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="note-modal-form">
                                                <div class="modal-body"><a class="modal-close pull-right" aria-hidden="true"
                                                                           tabindex="-1">Close</a>
                                                    <div class="title">Keyboard shortcuts</div>
                                                    <div class="note-shortcut-row row">
                                                        <div class="note-shortcut note-shortcut-col col-sm-6 col-xs-12">
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-title col-xs-offset-6">
                                                                    Action
                                                                </div>
                                                            </div>
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-key">
                                                                    Ctrl + Z
                                                                </div>
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-name">
                                                                    Undo
                                                                </div>
                                                            </div>
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-key">
                                                                    Ctrl + Shift + Z
                                                                </div>
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-name">
                                                                    Redo
                                                                </div>
                                                            </div>
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-key">
                                                                    Ctrl + ]
                                                                </div>
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-name">
                                                                    Indent
                                                                </div>
                                                            </div>
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-key">
                                                                    Ctrl + [
                                                                </div>
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-name">
                                                                    Outdent
                                                                </div>
                                                            </div>
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-key">
                                                                    Ctrl + ENTER
                                                                </div>
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-name">
                                                                    Insert Horizontal Rule
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="note-shortcut note-shortcut-col col-sm-6 col-xs-12">
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-title col-xs-offset-6">
                                                                    Text formatting
                                                                </div>
                                                            </div>
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-key">
                                                                    Ctrl + B
                                                                </div>
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-name">
                                                                    Bold
                                                                </div>
                                                            </div>
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-key">
                                                                    Ctrl + I
                                                                </div>
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-name">
                                                                    Italic
                                                                </div>
                                                            </div>
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-key">
                                                                    Ctrl + U
                                                                </div>
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-name">
                                                                    Underline
                                                                </div>
                                                            </div>
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-key">
                                                                    Ctrl + \
                                                                </div>
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-name">
                                                                    Remove Font Style
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="note-shortcut-row row">
                                                        <div class="note-shortcut note-shortcut-col col-sm-6 col-xs-12">
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-title col-xs-offset-6">
                                                                    Document Style
                                                                </div>
                                                            </div>
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-key">
                                                                    Ctrl + NUM0
                                                                </div>
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-name">
                                                                    Normal
                                                                </div>
                                                            </div>
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-key">
                                                                    Ctrl + NUM1
                                                                </div>
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-name">
                                                                    Header 1
                                                                </div>
                                                            </div>
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-key">
                                                                    Ctrl + NUM2
                                                                </div>
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-name">
                                                                    Header 2
                                                                </div>
                                                            </div>
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-key">
                                                                    Ctrl + NUM3
                                                                </div>
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-name">
                                                                    Header 3
                                                                </div>
                                                            </div>
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-key">
                                                                    Ctrl + NUM4
                                                                </div>
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-name">
                                                                    Header 4
                                                                </div>
                                                            </div>
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-key">
                                                                    Ctrl + NUM5
                                                                </div>
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-name">
                                                                    Header 5
                                                                </div>
                                                            </div>
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-key">
                                                                    Ctrl + NUM6
                                                                </div>
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-name">
                                                                    Header 6
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="note-shortcut note-shortcut-col col-sm-6 col-xs-12">
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-title col-xs-offset-6">
                                                                    Paragraph formatting
                                                                </div>
                                                            </div>
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-key">
                                                                    Ctrl + Shift + L
                                                                </div>
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-name">
                                                                    Align left
                                                                </div>
                                                            </div>
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-key">
                                                                    Ctrl + Shift + E
                                                                </div>
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-name">
                                                                    Align center
                                                                </div>
                                                            </div>
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-key">
                                                                    Ctrl + Shift + R
                                                                </div>
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-name">
                                                                    Align right
                                                                </div>
                                                            </div>
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-key">
                                                                    Ctrl + Shift + J
                                                                </div>
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-name">
                                                                    Justify full
                                                                </div>
                                                            </div>
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-key">
                                                                    Ctrl + Shift + NUM7
                                                                </div>
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-name">
                                                                    Ordered list
                                                                </div>
                                                            </div>
                                                            <div class="note-shortcut-row row">
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-key">
                                                                    Ctrl + Shift + NUM8
                                                                </div>
                                                                <div class="note-shortcut-col col-xs-6 note-shortcut-name">
                                                                    Unordered list
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="text-center"><a href="//hackerwins.github.io/summernote/"
                                                                              target="_blank">Summernote 0.6.0</a> · <a
                                                                href="//github.com/HackerWins/summernote" target="_blank">Project</a>
                                                        · <a href="//github.com/HackerWins/summernote/issues"
                                                             target="_blank">Issues</a></p></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="note-handle">
                                <div class="note-control-selection" style="display: none;">
                                    <div class="note-control-selection-bg"></div>
                                    <div class="note-control-holder note-control-nw"></div>
                                    <div class="note-control-holder note-control-ne"></div>
                                    <div class="note-control-holder note-control-sw"></div>
                                    <div class="note-control-sizing note-control-se"></div>
                                    <div class="note-control-selection-info"></div>
                                </div>
                            </div>
                            <div class="note-popover">
                                <div class="note-link-popover popover bottom in" style="display: none;">
                                    <div class="arrow"></div>
                                    <div class="popover-content"><a href="http://www.google.com" target="_blank">www.google.com</a>&nbsp;&nbsp;
                                        <div class="note-insert btn-group">
                                            <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                                    data-event="showLinkDialog" data-hide="true" tabindex="-1"
                                                    data-original-title="Edit (CTRL+K)"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                                    data-event="unlink" tabindex="-1" data-original-title="Unlink"><i
                                                        class="fa fa-unlink"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="note-image-popover popover bottom in" style="display: none;">
                                    <div class="arrow"></div>
                                    <div class="popover-content">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                                    data-event="resize" data-value="1" tabindex="-1"
                                                    data-original-title="Resize Full"><span
                                                        class="note-fontsize-10">100%</span></button>
                                            <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                                    data-event="resize" data-value="0.5" tabindex="-1"
                                                    data-original-title="Resize Half"><span
                                                        class="note-fontsize-10">50%</span></button>
                                            <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                                    data-event="resize" data-value="0.25" tabindex="-1"
                                                    data-original-title="Resize Quarter"><span
                                                        class="note-fontsize-10">25%</span></button>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                                    data-event="floatMe" data-value="left" tabindex="-1"
                                                    data-original-title="Float Left"><i class="fa fa-align-left"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                                    data-event="floatMe" data-value="right" tabindex="-1"
                                                    data-original-title="Float Right"><i class="fa fa-align-right"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                                    data-event="floatMe" data-value="none" tabindex="-1"
                                                    data-original-title="Float None"><i class="fa fa-align-justify"></i>
                                            </button>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                                    data-event="imageShape" data-value="img-rounded" tabindex="-1"
                                                    data-original-title="Shape: Rounded"><i class="fa fa-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                                    data-event="imageShape" data-value="img-circle" tabindex="-1"
                                                    data-original-title="Shape: Circle"><i class="fa fa-circle-o"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                                    data-event="imageShape" data-value="img-thumbnail" tabindex="-1"
                                                    data-original-title="Shape: Thumbnail"><i class="fa fa-picture-o"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                                    data-event="imageShape" tabindex="-1" data-original-title="Shape: None">
                                                <i class="fa fa-times"></i></button>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                                    data-event="removeMedia" data-value="none" tabindex="-1"
                                                    data-original-title="Remove Image"><i class="fa fa-trash-o"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="note-toolbar btn-toolbar">
                                <div class="note-style btn-group">
                                    <button type="button" class="btn btn-default btn-sm btn-small dropdown-toggle"
                                            data-toggle="dropdown" title="" tabindex="-1" data-original-title="Style"><i
                                                class="fa fa-magic"></i> <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a data-event="formatBlock" href="#" data-value="p">Normal</a></li>
                                        <li><a data-event="formatBlock" href="#" data-value="blockquote">
                                                <blockquote>Quote</blockquote>
                                            </a></li>
                                        <li><a data-event="formatBlock" href="#" data-value="pre">Code</a></li>
                                        <li><a data-event="formatBlock" href="#" data-value="h1"><h1>Header 1</h1></a></li>
                                        <li><a data-event="formatBlock" href="#" data-value="h2"><h2>Header 2</h2></a></li>
                                        <li><a data-event="formatBlock" href="#" data-value="h3"><h3>Header 3</h3></a></li>
                                        <li><a data-event="formatBlock" href="#" data-value="h4"><h4>Header 4</h4></a></li>
                                        <li><a data-event="formatBlock" href="#" data-value="h5"><h5>Header 5</h5></a></li>
                                        <li><a data-event="formatBlock" href="#" data-value="h6"><h6>Header 6</h6></a></li>
                                    </ul>
                                </div>
                                <div class="note-font btn-group">
                                    <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                            data-event="bold" tabindex="-1" data-original-title="Bold (CTRL+B)"><i
                                                class="fa fa-bold"></i></button>
                                    <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                            data-event="italic" tabindex="-1" data-original-title="Italic (CTRL+I)"><i
                                                class="fa fa-italic"></i></button>
                                    <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                            data-event="underline" tabindex="-1" data-original-title="Underline (CTRL+U)"><i
                                                class="fa fa-underline"></i></button>
                                    <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                            data-event="removeFormat" tabindex="-1"
                                            data-original-title="Remove Font Style (CTRL+\)"><i class="fa fa-eraser"></i>
                                    </button>
                                </div>
                                <div class="note-fontname btn-group">
                                    <button type="button" class="btn btn-default btn-sm btn-small dropdown-toggle"
                                            data-toggle="dropdown" title="" tabindex="-1" data-original-title="Font Family">
                                        <span class="note-current-fontname">Open Sans</span> <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a data-event="fontName" href="#" data-value="Arial" class=""><i
                                                        class="fa fa-check"></i> Arial</a></li>
                                        <li><a data-event="fontName" href="#" data-value="Arial Black" class=""><i
                                                        class="fa fa-check"></i> Arial Black</a></li>
                                        <li><a data-event="fontName" href="#" data-value="Comic Sans MS" class=""><i
                                                        class="fa fa-check"></i> Comic Sans MS</a></li>
                                        <li><a data-event="fontName" href="#" data-value="Courier New" class=""><i
                                                        class="fa fa-check"></i> Courier New</a></li>
                                        <li><a data-event="fontName" href="#" data-value="Impact" class=""><i
                                                        class="fa fa-check"></i> Impact</a></li>
                                        <li><a data-event="fontName" href="#" data-value="Tahoma" class=""><i
                                                        class="fa fa-check"></i> Tahoma</a></li>
                                        <li><a data-event="fontName" href="#" data-value="Times New Roman" class=""><i
                                                        class="fa fa-check"></i> Times New Roman</a></li>
                                        <li><a data-event="fontName" href="#" data-value="Verdana" class=""><i
                                                        class="fa fa-check"></i> Verdana</a></li>
                                    </ul>
                                </div>
                                <div class="note-color btn-group">
                                    <button type="button" class="btn btn-default btn-sm btn-small note-recent-color"
                                            title="" data-event="color"
                                            data-value="{&quot;backColor&quot;:&quot;yellow&quot;}" tabindex="-1"
                                            data-original-title="Recent Color"><i class="fa fa-font"
                                                                                  style="color:black;background-color:yellow;"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm btn-small dropdown-toggle"
                                            data-toggle="dropdown" title="" tabindex="-1" data-original-title="More Color">
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="btn-group">
                                                <div class="note-palette-title">Background Color</div>
                                                <div class="note-color-reset" data-event="backColor" data-value="inherit"
                                                     title="Transparent">Set transparent
                                                </div>
                                                <div class="note-color-palette" data-target-event="backColor">
                                                    <div class="note-color-row">
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#000000;" data-event="backColor"
                                                                data-value="#000000" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#000000"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#424242;" data-event="backColor"
                                                                data-value="#424242" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#424242"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#636363;" data-event="backColor"
                                                                data-value="#636363" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#636363"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#9C9C94;" data-event="backColor"
                                                                data-value="#9C9C94" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#9C9C94"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#CEC6CE;" data-event="backColor"
                                                                data-value="#CEC6CE" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#CEC6CE"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#EFEFEF;" data-event="backColor"
                                                                data-value="#EFEFEF" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#EFEFEF"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#F7F7F7;" data-event="backColor"
                                                                data-value="#F7F7F7" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#F7F7F7"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#FFFFFF;" data-event="backColor"
                                                                data-value="#FFFFFF" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#FFFFFF"></button>
                                                    </div>
                                                    <div class="note-color-row">
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#FF0000;" data-event="backColor"
                                                                data-value="#FF0000" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#FF0000"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#FF9C00;" data-event="backColor"
                                                                data-value="#FF9C00" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#FF9C00"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#FFFF00;" data-event="backColor"
                                                                data-value="#FFFF00" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#FFFF00"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#00FF00;" data-event="backColor"
                                                                data-value="#00FF00" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#00FF00"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#00FFFF;" data-event="backColor"
                                                                data-value="#00FFFF" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#00FFFF"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#0000FF;" data-event="backColor"
                                                                data-value="#0000FF" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#0000FF"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#9C00FF;" data-event="backColor"
                                                                data-value="#9C00FF" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#9C00FF"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#FF00FF;" data-event="backColor"
                                                                data-value="#FF00FF" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#FF00FF"></button>
                                                    </div>
                                                    <div class="note-color-row">
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#F7C6CE;" data-event="backColor"
                                                                data-value="#F7C6CE" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#F7C6CE"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#FFE7CE;" data-event="backColor"
                                                                data-value="#FFE7CE" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#FFE7CE"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#FFEFC6;" data-event="backColor"
                                                                data-value="#FFEFC6" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#FFEFC6"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#D6EFD6;" data-event="backColor"
                                                                data-value="#D6EFD6" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#D6EFD6"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#CEDEE7;" data-event="backColor"
                                                                data-value="#CEDEE7" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#CEDEE7"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#CEE7F7;" data-event="backColor"
                                                                data-value="#CEE7F7" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#CEE7F7"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#D6D6E7;" data-event="backColor"
                                                                data-value="#D6D6E7" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#D6D6E7"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#E7D6DE;" data-event="backColor"
                                                                data-value="#E7D6DE" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#E7D6DE"></button>
                                                    </div>
                                                    <div class="note-color-row">
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#E79C9C;" data-event="backColor"
                                                                data-value="#E79C9C" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#E79C9C"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#FFC69C;" data-event="backColor"
                                                                data-value="#FFC69C" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#FFC69C"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#FFE79C;" data-event="backColor"
                                                                data-value="#FFE79C" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#FFE79C"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#B5D6A5;" data-event="backColor"
                                                                data-value="#B5D6A5" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#B5D6A5"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#A5C6CE;" data-event="backColor"
                                                                data-value="#A5C6CE" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#A5C6CE"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#9CC6EF;" data-event="backColor"
                                                                data-value="#9CC6EF" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#9CC6EF"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#B5A5D6;" data-event="backColor"
                                                                data-value="#B5A5D6" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#B5A5D6"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#D6A5BD;" data-event="backColor"
                                                                data-value="#D6A5BD" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#D6A5BD"></button>
                                                    </div>
                                                    <div class="note-color-row">
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#E76363;" data-event="backColor"
                                                                data-value="#E76363" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#E76363"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#F7AD6B;" data-event="backColor"
                                                                data-value="#F7AD6B" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#F7AD6B"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#FFD663;" data-event="backColor"
                                                                data-value="#FFD663" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#FFD663"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#94BD7B;" data-event="backColor"
                                                                data-value="#94BD7B" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#94BD7B"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#73A5AD;" data-event="backColor"
                                                                data-value="#73A5AD" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#73A5AD"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#6BADDE;" data-event="backColor"
                                                                data-value="#6BADDE" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#6BADDE"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#8C7BC6;" data-event="backColor"
                                                                data-value="#8C7BC6" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#8C7BC6"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#C67BA5;" data-event="backColor"
                                                                data-value="#C67BA5" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#C67BA5"></button>
                                                    </div>
                                                    <div class="note-color-row">
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#CE0000;" data-event="backColor"
                                                                data-value="#CE0000" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#CE0000"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#E79439;" data-event="backColor"
                                                                data-value="#E79439" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#E79439"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#EFC631;" data-event="backColor"
                                                                data-value="#EFC631" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#EFC631"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#6BA54A;" data-event="backColor"
                                                                data-value="#6BA54A" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#6BA54A"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#4A7B8C;" data-event="backColor"
                                                                data-value="#4A7B8C" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#4A7B8C"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#3984C6;" data-event="backColor"
                                                                data-value="#3984C6" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#3984C6"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#634AA5;" data-event="backColor"
                                                                data-value="#634AA5" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#634AA5"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#A54A7B;" data-event="backColor"
                                                                data-value="#A54A7B" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#A54A7B"></button>
                                                    </div>
                                                    <div class="note-color-row">
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#9C0000;" data-event="backColor"
                                                                data-value="#9C0000" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#9C0000"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#B56308;" data-event="backColor"
                                                                data-value="#B56308" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#B56308"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#BD9400;" data-event="backColor"
                                                                data-value="#BD9400" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#BD9400"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#397B21;" data-event="backColor"
                                                                data-value="#397B21" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#397B21"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#104A5A;" data-event="backColor"
                                                                data-value="#104A5A" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#104A5A"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#085294;" data-event="backColor"
                                                                data-value="#085294" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#085294"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#311873;" data-event="backColor"
                                                                data-value="#311873" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#311873"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#731842;" data-event="backColor"
                                                                data-value="#731842" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#731842"></button>
                                                    </div>
                                                    <div class="note-color-row">
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#630000;" data-event="backColor"
                                                                data-value="#630000" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#630000"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#7B3900;" data-event="backColor"
                                                                data-value="#7B3900" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#7B3900"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#846300;" data-event="backColor"
                                                                data-value="#846300" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#846300"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#295218;" data-event="backColor"
                                                                data-value="#295218" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#295218"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#083139;" data-event="backColor"
                                                                data-value="#083139" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#083139"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#003163;" data-event="backColor"
                                                                data-value="#003163" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#003163"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#21104A;" data-event="backColor"
                                                                data-value="#21104A" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#21104A"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#4A1031;" data-event="backColor"
                                                                data-value="#4A1031" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#4A1031"></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-group">
                                                <div class="note-palette-title">Foreground Color</div>
                                                <div class="note-color-reset" data-event="foreColor" data-value="inherit"
                                                     title="Reset">Reset to default
                                                </div>
                                                <div class="note-color-palette" data-target-event="foreColor">
                                                    <div class="note-color-row">
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#000000;" data-event="foreColor"
                                                                data-value="#000000" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#000000"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#424242;" data-event="foreColor"
                                                                data-value="#424242" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#424242"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#636363;" data-event="foreColor"
                                                                data-value="#636363" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#636363"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#9C9C94;" data-event="foreColor"
                                                                data-value="#9C9C94" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#9C9C94"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#CEC6CE;" data-event="foreColor"
                                                                data-value="#CEC6CE" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#CEC6CE"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#EFEFEF;" data-event="foreColor"
                                                                data-value="#EFEFEF" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#EFEFEF"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#F7F7F7;" data-event="foreColor"
                                                                data-value="#F7F7F7" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#F7F7F7"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#FFFFFF;" data-event="foreColor"
                                                                data-value="#FFFFFF" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#FFFFFF"></button>
                                                    </div>
                                                    <div class="note-color-row">
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#FF0000;" data-event="foreColor"
                                                                data-value="#FF0000" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#FF0000"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#FF9C00;" data-event="foreColor"
                                                                data-value="#FF9C00" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#FF9C00"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#FFFF00;" data-event="foreColor"
                                                                data-value="#FFFF00" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#FFFF00"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#00FF00;" data-event="foreColor"
                                                                data-value="#00FF00" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#00FF00"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#00FFFF;" data-event="foreColor"
                                                                data-value="#00FFFF" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#00FFFF"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#0000FF;" data-event="foreColor"
                                                                data-value="#0000FF" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#0000FF"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#9C00FF;" data-event="foreColor"
                                                                data-value="#9C00FF" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#9C00FF"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#FF00FF;" data-event="foreColor"
                                                                data-value="#FF00FF" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#FF00FF"></button>
                                                    </div>
                                                    <div class="note-color-row">
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#F7C6CE;" data-event="foreColor"
                                                                data-value="#F7C6CE" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#F7C6CE"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#FFE7CE;" data-event="foreColor"
                                                                data-value="#FFE7CE" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#FFE7CE"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#FFEFC6;" data-event="foreColor"
                                                                data-value="#FFEFC6" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#FFEFC6"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#D6EFD6;" data-event="foreColor"
                                                                data-value="#D6EFD6" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#D6EFD6"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#CEDEE7;" data-event="foreColor"
                                                                data-value="#CEDEE7" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#CEDEE7"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#CEE7F7;" data-event="foreColor"
                                                                data-value="#CEE7F7" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#CEE7F7"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#D6D6E7;" data-event="foreColor"
                                                                data-value="#D6D6E7" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#D6D6E7"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#E7D6DE;" data-event="foreColor"
                                                                data-value="#E7D6DE" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#E7D6DE"></button>
                                                    </div>
                                                    <div class="note-color-row">
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#E79C9C;" data-event="foreColor"
                                                                data-value="#E79C9C" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#E79C9C"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#FFC69C;" data-event="foreColor"
                                                                data-value="#FFC69C" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#FFC69C"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#FFE79C;" data-event="foreColor"
                                                                data-value="#FFE79C" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#FFE79C"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#B5D6A5;" data-event="foreColor"
                                                                data-value="#B5D6A5" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#B5D6A5"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#A5C6CE;" data-event="foreColor"
                                                                data-value="#A5C6CE" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#A5C6CE"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#9CC6EF;" data-event="foreColor"
                                                                data-value="#9CC6EF" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#9CC6EF"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#B5A5D6;" data-event="foreColor"
                                                                data-value="#B5A5D6" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#B5A5D6"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#D6A5BD;" data-event="foreColor"
                                                                data-value="#D6A5BD" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#D6A5BD"></button>
                                                    </div>
                                                    <div class="note-color-row">
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#E76363;" data-event="foreColor"
                                                                data-value="#E76363" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#E76363"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#F7AD6B;" data-event="foreColor"
                                                                data-value="#F7AD6B" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#F7AD6B"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#FFD663;" data-event="foreColor"
                                                                data-value="#FFD663" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#FFD663"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#94BD7B;" data-event="foreColor"
                                                                data-value="#94BD7B" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#94BD7B"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#73A5AD;" data-event="foreColor"
                                                                data-value="#73A5AD" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#73A5AD"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#6BADDE;" data-event="foreColor"
                                                                data-value="#6BADDE" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#6BADDE"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#8C7BC6;" data-event="foreColor"
                                                                data-value="#8C7BC6" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#8C7BC6"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#C67BA5;" data-event="foreColor"
                                                                data-value="#C67BA5" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#C67BA5"></button>
                                                    </div>
                                                    <div class="note-color-row">
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#CE0000;" data-event="foreColor"
                                                                data-value="#CE0000" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#CE0000"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#E79439;" data-event="foreColor"
                                                                data-value="#E79439" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#E79439"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#EFC631;" data-event="foreColor"
                                                                data-value="#EFC631" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#EFC631"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#6BA54A;" data-event="foreColor"
                                                                data-value="#6BA54A" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#6BA54A"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#4A7B8C;" data-event="foreColor"
                                                                data-value="#4A7B8C" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#4A7B8C"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#3984C6;" data-event="foreColor"
                                                                data-value="#3984C6" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#3984C6"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#634AA5;" data-event="foreColor"
                                                                data-value="#634AA5" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#634AA5"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#A54A7B;" data-event="foreColor"
                                                                data-value="#A54A7B" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#A54A7B"></button>
                                                    </div>
                                                    <div class="note-color-row">
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#9C0000;" data-event="foreColor"
                                                                data-value="#9C0000" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#9C0000"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#B56308;" data-event="foreColor"
                                                                data-value="#B56308" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#B56308"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#BD9400;" data-event="foreColor"
                                                                data-value="#BD9400" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#BD9400"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#397B21;" data-event="foreColor"
                                                                data-value="#397B21" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#397B21"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#104A5A;" data-event="foreColor"
                                                                data-value="#104A5A" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#104A5A"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#085294;" data-event="foreColor"
                                                                data-value="#085294" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#085294"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#311873;" data-event="foreColor"
                                                                data-value="#311873" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#311873"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#731842;" data-event="foreColor"
                                                                data-value="#731842" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#731842"></button>
                                                    </div>
                                                    <div class="note-color-row">
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#630000;" data-event="foreColor"
                                                                data-value="#630000" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#630000"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#7B3900;" data-event="foreColor"
                                                                data-value="#7B3900" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#7B3900"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#846300;" data-event="foreColor"
                                                                data-value="#846300" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#846300"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#295218;" data-event="foreColor"
                                                                data-value="#295218" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#295218"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#083139;" data-event="foreColor"
                                                                data-value="#083139" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#083139"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#003163;" data-event="foreColor"
                                                                data-value="#003163" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#003163"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#21104A;" data-event="foreColor"
                                                                data-value="#21104A" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#21104A"></button>
                                                        <button type="button" class="note-color-btn"
                                                                style="background-color:#4A1031;" data-event="foreColor"
                                                                data-value="#4A1031" title="" data-toggle="button"
                                                                tabindex="-1" data-original-title="#4A1031"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="note-para btn-group">
                                    <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                            data-event="insertUnorderedList" tabindex="-1"
                                            data-original-title="Unordered list (CTRL+SHIFT+NUM7)"><i
                                                class="fa fa-list-ul"></i></button>
                                    <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                            data-event="insertOrderedList" tabindex="-1"
                                            data-original-title="Ordered list (CTRL+SHIFT+NUM8)"><i
                                                class="fa fa-list-ol"></i></button>
                                    <button type="button" class="btn btn-default btn-sm btn-small dropdown-toggle"
                                            data-toggle="dropdown" title="" tabindex="-1" data-original-title="Paragraph"><i
                                                class="fa fa-align-left"></i> <span class="caret"></span></button>
                                    <div class="dropdown-menu">
                                        <div class="note-align btn-group">
                                            <button type="button" class="btn btn-default btn-sm btn-small active" title=""
                                                    data-event="justifyLeft" tabindex="-1"
                                                    data-original-title="Align left (CTRL+SHIFT+L)"><i
                                                        class="fa fa-align-left"></i></button>
                                            <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                                    data-event="justifyCenter" tabindex="-1"
                                                    data-original-title="Align center (CTRL+SHIFT+E)"><i
                                                        class="fa fa-align-center"></i></button>
                                            <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                                    data-event="justifyRight" tabindex="-1"
                                                    data-original-title="Align right (CTRL+SHIFT+R)"><i
                                                        class="fa fa-align-right"></i></button>
                                            <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                                    data-event="justifyFull" tabindex="-1"
                                                    data-original-title="Justify full (CTRL+SHIFT+J)"><i
                                                        class="fa fa-align-justify"></i></button>
                                        </div>
                                        <div class="note-list btn-group">
                                            <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                                    data-event="indent" tabindex="-1" data-original-title="Indent (CTRL+])">
                                                <i class="fa fa-indent"></i></button>
                                            <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                                    data-event="outdent" tabindex="-1"
                                                    data-original-title="Outdent (CTRL+[)"><i class="fa fa-outdent"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="note-height btn-group">
                                    <button type="button" class="btn btn-default btn-sm btn-small dropdown-toggle"
                                            data-toggle="dropdown" title="" tabindex="-1" data-original-title="Line Height">
                                        <i class="fa fa-text-height"></i> <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a data-event="lineHeight" href="#" data-value="1" class=""><i
                                                        class="fa fa-check"></i> 1.0</a></li>
                                        <li><a data-event="lineHeight" href="#" data-value="1.2" class=""><i
                                                        class="fa fa-check"></i> 1.2</a></li>
                                        <li><a data-event="lineHeight" href="#" data-value="1.4" class="checked"><i
                                                        class="fa fa-check"></i> 1.4</a></li>
                                        <li><a data-event="lineHeight" href="#" data-value="1.5" class=""><i
                                                        class="fa fa-check"></i> 1.5</a></li>
                                        <li><a data-event="lineHeight" href="#" data-value="1.6" class=""><i
                                                        class="fa fa-check"></i> 1.6</a></li>
                                        <li><a data-event="lineHeight" href="#" data-value="1.8" class=""><i
                                                        class="fa fa-check"></i> 1.8</a></li>
                                        <li><a data-event="lineHeight" href="#" data-value="2" class=""><i
                                                        class="fa fa-check"></i> 2.0</a></li>
                                        <li><a data-event="lineHeight" href="#" data-value="3" class=""><i
                                                        class="fa fa-check"></i> 3.0</a></li>
                                    </ul>
                                </div>
                                <div class="note-table btn-group">
                                    <button type="button" class="btn btn-default btn-sm btn-small dropdown-toggle"
                                            data-toggle="dropdown" title="" tabindex="-1" data-original-title="Table"><i
                                                class="fa fa-table"></i> <span class="caret"></span></button>
                                    <ul class="note-table dropdown-menu">
                                        <div class="note-dimension-picker">
                                            <div class="note-dimension-picker-mousecatcher" data-event="insertTable"
                                                 data-value="1x1" style="width: 10em; height: 10em;"></div>
                                            <div class="note-dimension-picker-highlighted"></div>
                                            <div class="note-dimension-picker-unhighlighted"></div>
                                        </div>
                                        <div class="note-dimension-display"> 1 x 1</div>
                                    </ul>
                                </div>
                                <div class="note-insert btn-group">
                                    <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                            data-event="showLinkDialog" data-hide="true" tabindex="-1"
                                            data-original-title="Link (CTRL+K)"><i class="fa fa-link"></i></button>
                                    <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                            data-event="showImageDialog" data-hide="true" tabindex="-1"
                                            data-original-title="Picture"><i class="fa fa-picture-o"></i></button>
                                    <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                            data-event="insertHorizontalRule" tabindex="-1"
                                            data-original-title="Insert Horizontal Rule (CTRL+ENTER)"><i
                                                class="fa fa-minus"></i></button>
                                </div>
                                <div class="note-view btn-group">
                                    <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                            data-event="fullscreen" tabindex="-1" data-original-title="Full Screen"><i
                                                class="fa fa-arrows-alt"></i></button>
                                    <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                            data-event="codeview" tabindex="-1" data-original-title="Code View"><i
                                                class="fa fa-code"></i></button>
                                </div>
                                <div class="note-help btn-group">
                                    <button type="button" class="btn btn-default btn-sm btn-small" title=""
                                            data-event="showHelpDialog" data-hide="true" tabindex="-1"
                                            data-original-title="Help"><i class="fa fa-question"></i></button>
                                </div>
                            </div>
                            <textarea class="note-codable"></textarea>
                            <div class="note-editable" id="div_opportunity_scope" contenteditable="true" style="height: 200px;"></div>

                            <div class="note-statusbar">
                                <div class="note-resizebar">
                                    <div class="note-icon-bar"></div>
                                    <div class="note-icon-bar"></div>
                                    <div class="note-icon-bar"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="div_estimatedCost" class="tab-pane">

                    <div class="btn-group">
                        <button id="btn_new_data" class="btn green">
                            Add New <i class="fa fa-plus"></i>
                        </button>
                    </div>

                    <table id="opportunity_estimatedCost_table-11" width="100%" class="table table-striped table-hover table-bordered">

                    </table>

                </div>
                <div id="div_estimatedPayment" class="tab-pane">

                    <table id="opportunity_estimatedPayment_table-{{$id}}" width="100%">

                    </table>
                </div>
                <div id="div_activity" class="tab-pane">

                    <table id="opportunity_activities_table-{{$id}}" width="100%">

                    </table>
                </div>
            </div>
        </div>
    </section>
</form>

<script src="{{Request::root()}}/js/editable-table.js"></script>
<script type="text/javascript">

    insertEstimatedCostDataToListe(null,11);

    $(document).ready(function() {
        EditableTable.init();
    });


    $(document).ready(function() {


        $('#btn_opportunity_update').on('click', function () {
            $('#opportunity_update_scope-{{$id}}').val($('#div_opportunity_update-' + {{$id}} + ' #div_opportunity_scope').html());

        });

    });


</script>
