@extends('app')

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

    </section>
@endsection