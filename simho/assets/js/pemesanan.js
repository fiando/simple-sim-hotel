var kamar;

$( document ).ready(function() {
  console.log( "ready!" );

  $("#idtipe_kamar").change(function(){
    var tipe = this.value;
    $("#idruang_kamar").children().remove();
    $(kamar).each(function(i,v) {
        if (tipe == kamar[i]['id_tipe_kamar']) {
          $("#idruang_kamar").append('<option value="' + kamar[i]['idruang_kamar'] +'">' + kamar[i]['idruang_kamar'] + '</option>');
        }
      });
  });

  $("#idruang_kamar").change(function() {
    var banyak_kamar = $("#idruang_kamar").find('option:selected').length;
    $("#jml_kamar").val(banyak_kamar);
  });
});
