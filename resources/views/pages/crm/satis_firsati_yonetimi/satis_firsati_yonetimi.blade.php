@extends('app')
@include('pages.crm.satis_firsati_yonetimi.ekle')
@include('pages.crm.satis_firsati_yonetimi.listele')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-grey">
                    <ul id="oppdynamicTabList" class="nav nav-tabs bold">

                        @section('tab')

                        @show

                    </ul>
                </header>
                <div class="panel-body">
                    <div id="oppdynamicTabContent" class="tab-content">
                        @section('tabcontent')

                        @show
                    </div>
                </div>
            </section>

            <div class="modal fade modal-dialog-center" id="modal_opportunity_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content-wrap">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Satış Firsatı Sil</h4>
                            </div>
                            <div class="margin-top-15 margin-left-10">

                                <p class="centered" id="modal_opp_delete_body"> </p>

                            </div>
                            <div class="modal-footer margin-top-15">
                                <button data-dismiss="modal" class="btn btn-warning" type="button">Kapat</button>
                                <button class="btn btn-danger" type="button" id="btn_modal_opp_delete"> Sil</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </section>



    <script src="{{Request::root()}}/js/jquery.dataTables.min.js"></script>
    <script src="{{Request::root()}}/assets/summernote/dist/summernote.min.js"></script>
    <script type="text/javascript" src="{{Request::root()}}/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="{{Request::root()}}/js/satisfirsati_yonetimi.js"></script>

    <script type="text/javascript">

        $('.dpYears').datepicker({
            format: 'mm/yyyy',
            dateFormat: 'mm yy',
            autoclose: true
        }).datepicker('setDate', 'today').focus(function () {
            $(".datetimepicker-days").hide()});



        jQuery(document).ready(function(){

            $('.summernote').summernote({
                height: 200,                 // set editor height

                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor

                focus: true                 // set focus to editable area after initializing summernote
            });
        });

        insertOpportunitiesDataToListe({!! $oppTableData !!});

    </script>


@endsection
