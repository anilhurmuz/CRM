
<!--    -->


function kisi_searc_toogle(buton){

    if(buton.id == 'btn_kisi_search_name')
        $("div#search_kisi_name").toggle(100);
    else if(buton.id == 'btn_kisi_search_surname')
        $("div#search_kisi_surname").toggle(100);
    else if(buton.id == 'btn_kisi_search_account')
        $("div#search_kisi_account").toggle(100);
    else if(buton.id == 'btn_kisi_search_status')
        $("div#search_kisi_status").toggle(100);
    else if(buton.id == 'btn_kisi_search_title')
        $("div#search_kisi_title").toggle(100);
    else if(buton.id == 'btn_kisi_search_phone1')
        $("div#search_kisi_phone1").toggle(100);
    else if(buton.id == 'btn_kisi_search_phone2')
        $("div#search_kisi_phone2").toggle(100);
    else if(buton.id == 'btn_kisi_search_facebook')
        $("div#search_kisi_facebook").toggle(100);
    else if(buton.id == 'btn_kisi_search_twitter')
        $("div#search_kisi_twitter").toggle(100);
    else if(buton.id == 'btn_islem_contact_linkedin')
        $("div#search_kisi_linkedin").toggle(100);
    else if(buton.id == 'btn_islem_bulletin')
        $("div#search_kisi_bulletin").toggle(100);



}

function show_kisi_guncelle(){
    $("#div_kisi_güncelle").addClass("active");
    $("#div_kisi_ekle").removeClass("active");
    $("#div_kisi_listele").removeClass("active");
    $("#li_kisi_güncelle").addClass("active");
    document.getElementById('li_kisi_güncelle').style.display='block';
    $("#li_kisi_listele").removeClass("active");
    $("#a_kisi_güncelle").attr("aria-expanded","true");

}


function insertDataToListe(dataset) {

    $('#kisi_listele_tablo').DataTable( {
        data: dataset,
        "columnDefs" : [
            {
                targets  :   [0],
                visible :   false,
                searchable: false

            }
        ],
        columns: [
            { data:"id"},
            { title: "Adı", data:"name" },
            { title: "Soyadı", data:"surname" },
            { title: "Durumu", data:"status" },
            { title: "Ünvanı", data:"title" },
            { title: "Firması", data:"xcmpcode" },
            { title: "İş Telefonu", data:"phone1" },
            { title: "Cep Telefonu", data:"phone2" },
            { title:'İşlemler', defaultContent:"<button onclick='show_kisi_guncelle()' class='btn btn-primary btn-xs btn-tablo-guncelle'><i class='fa fa-pencil'>  Güncelle</i>" +
            "</button><button class='btn btn-danger btn-xs btn-tablo-sil'><i class='fa fa-trash-o '>  Sil</i></button>"}
        ],

        "language": {
            "lengthMenu": ' <select>'+
            '<option value="10">10</option>'+
            '<option value="30">30</option>'+
            '<option value="50">50</option>'+
            '<option value="100">100</option>'+
            '<option value="200">200</option>'+
            '<option value="500">500</option>'+
            '<option value="1000">1000</option>'+
            '<option value="-1">All</option>'+
            '</select> Kayıt Görüntüle',
            "sInfo": "Toplam \_TOTAL\_ sonuç arasından \_START\_ ile \_END\_ arasındaki sonuçlar gösteriliyor.",
            "paginate": {
                "next": "İleri",
                "previous": "Geri"
            },
            "emptyTable": "Tablo içinde görüntülenecek veri bulunamadı",
            "sInfoEmpty": "Toplam 0 sonuç arasından 0 ile 0 arasındaki sonuçlar gösteriliyor."
        },

        fnCreatedRow:function(row,data,index){

            var my_token = $('#my_token').val();

            $(row).find('.btn-tablo-sil').on('click',function(){
                if(confirm(data['name']+" isimli kullanıcı silmek istediğinizden emin misiniz?")){
                    $.ajax({
                        url : window.location + '/delete',
                        type: 'POST',
                        data: {'id':data['id'],'_token':my_token},
                        success:function(data){
                            row.remove();
                        }, error:function() {
                            alert('AJAX ERROR!');
                        }
                    });
                }

            });
        }

    } );
}







