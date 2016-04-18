@extends('app')
@include('pages.crm.ebulten_yonetimi.ekle')
@include('pages.crm.ebulten_yonetimi.listele')
@include('pages.commonmodals')
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
                <div class="datetimepicker datetimepicker-dropdown-bottom-left dropdown-menu" style="left: 0px; z-index: 10;"><div class="datetimepicker-minutes" style="display: none;"><table class=" table-condensed"><thead><tr><th class="prev" style="visibility: visible;"><i class="fa fa-angle-left"></i></th><th colspan="5" class="switch">15 June 2012</th><th class="next" style="visibility: visible;"><i class="fa fa-angle-right"></i></th></tr></thead><tbody><tr><td colspan="7"><span class="minute">14:00</span><span class="minute">14:05</span><span class="minute">14:10</span><span class="minute">14:15</span><span class="minute">14:20</span><span class="minute">14:25</span><span class="minute">14:30</span><span class="minute">14:35</span><span class="minute">14:40</span><span class="minute active">14:45</span><span class="minute">14:50</span><span class="minute">14:55</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today">Today</th></tr></tfoot></table></div><div class="datetimepicker-hours" style="display: none;"><table class=" table-condensed"><thead><tr><th class="prev" style="visibility: visible;"><i class="fa fa-angle-left"></i></th><th colspan="5" class="switch">15 June 2012</th><th class="next" style="visibility: visible;"><i class="fa fa-angle-right"></i></th></tr></thead><tbody><tr><td colspan="7"><span class="hour">0:00</span><span class="hour">1:00</span><span class="hour">2:00</span><span class="hour">3:00</span><span class="hour">4:00</span><span class="hour">5:00</span><span class="hour">6:00</span><span class="hour">7:00</span><span class="hour">8:00</span><span class="hour">9:00</span><span class="hour">10:00</span><span class="hour">11:00</span><span class="hour">12:00</span><span class="hour">13:00</span><span class="hour active">14:00</span><span class="hour">15:00</span><span class="hour">16:00</span><span class="hour">17:00</span><span class="hour">18:00</span><span class="hour">19:00</span><span class="hour">20:00</span><span class="hour">21:00</span><span class="hour">22:00</span><span class="hour">23:00</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today">Today</th></tr></tfoot></table></div><div class="datetimepicker-days" style="display: block;"><table class=" table-condensed"><thead><tr><th class="prev" style="visibility: visible;"><i class="fa fa-angle-left"></i></th><th colspan="5" class="switch">June 2012</th><th class="next" style="visibility: visible;"><i class="fa fa-angle-right"></i></th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td class="day old">27</td><td class="day old">28</td><td class="day old">29</td><td class="day old">30</td><td class="day old">31</td><td class="day">1</td><td class="day">2</td></tr><tr><td class="day">3</td><td class="day">4</td><td class="day">5</td><td class="day">6</td><td class="day">7</td><td class="day">8</td><td class="day">9</td></tr><tr><td class="day">10</td><td class="day">11</td><td class="day">12</td><td class="day">13</td><td class="day">14</td><td class="day active">15</td><td class="day">16</td></tr><tr><td class="day">17</td><td class="day">18</td><td class="day">19</td><td class="day">20</td><td class="day">21</td><td class="day">22</td><td class="day">23</td></tr><tr><td class="day">24</td><td class="day">25</td><td class="day">26</td><td class="day">27</td><td class="day">28</td><td class="day">29</td><td class="day">30</td></tr><tr><td class="day new">1</td><td class="day new">2</td><td class="day new">3</td><td class="day new">4</td><td class="day new">5</td><td class="day new">6</td><td class="day new">7</td></tr></tbody><tfoot><tr><th colspan="7" class="today">Today</th></tr></tfoot></table></div><div class="datetimepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" style="visibility: visible;"><i class="fa fa-angle-left"></i></th><th colspan="5" class="switch">2012</th><th class="next" style="visibility: visible;"><i class="fa fa-angle-right"></i></th></tr></thead><tbody><tr><td colspan="7"><span class="month">Jan</span><span class="month">Feb</span><span class="month">Mar</span><span class="month">Apr</span><span class="month">May</span><span class="month active">Jun</span><span class="month">Jul</span><span class="month">Aug</span><span class="month">Sep</span><span class="month">Oct</span><span class="month">Nov</span><span class="month">Dec</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today">Today</th></tr></tfoot></table></div><div class="datetimepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" style="visibility: visible;"><i class="fa fa-angle-left"></i></th><th colspan="5" class="switch">2010-2019</th><th class="next" style="visibility: visible;"><i class="fa fa-angle-right"></i></th></tr></thead><tbody><tr><td colspan="7"><span class="year old">2009</span><span class="year">2010</span><span class="year">2011</span><span class="year active">2012</span><span class="year">2013</span><span class="year">2014</span><span class="year">2015</span><span class="year">2016</span><span class="year">2017</span><span class="year">2018</span><span class="year">2019</span><span class="year old">2020</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today">Today</th></tr></tfoot></table></div></div>

            </section>
        </section>
        @section('modalRemove')
        @show
    </section>
    <script type="text/javascript" src="{{Request::root()}}/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="{{Request::root()}}/js/ebultenyonetimi.js"></script>
    <script type="text/javascript"
            src="{{Request::root()}}/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript">

        $(".form_datetime-component").datetimepicker({
            format: "yyyy-mm-dd hh:ii",
            autoclose: true
        });
    </script>



@endsection
