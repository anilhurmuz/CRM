@extends('app')
@include('pages.crm.musteri_yonetimi.ekle')
@include('pages.crm.musteri_yonetimi.listele')
@include('pages.modals')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-grey">
                    <ul id="dynamicTabList" class="nav nav-tabs bold">
                        @section('tab')

                        @show

                    </ul>
                </header>
                <div class="panel-body">
                    <div id="dynamicTabContent" class="tab-content">
                        @section('tabcontent')

                        @show
                    </div>
                </div>
            </section>
        </section>
        @section('modalAccountAddress')
            @show
        @section('modalAccountContact')
            @show
        @section('modalRemove')
            @show
    </section>


    <script src="{{Request::root()}}/js/musteri_yonetim.js"></script>

    <script type="text/javascript">
        $(function(){
            console.log({!! $mydata !!});
            insertDataToListe({!! $mydata !!});

        });
    </script>



@endsection
