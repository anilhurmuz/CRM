@section('tab')
    @parent
    <li class="active" id="li_ebulten_listele">
        <a data-toggle="tab" href="#listele" id="a_listele">Listele</a>
    </li>
@stop

@section('tabcontent')
    @parent
    <div id="listele" class="tab-pane active panel-body">

        <label for="bulletin_list_table_label" class="col-sm-1 width-150 control-label">E-Bülten Listesi :</label>

        <div id="bulletin_list_table_div" class="tab-pane active">

            <table id="bulletin_list_table" width="100%">

            </table>

        </div>

    </div>

    <script type="text/javascript">
    $(function(){
        fillDataToBulletinListDataTable({!! $mydata !!});
    });
    </script>
@stop