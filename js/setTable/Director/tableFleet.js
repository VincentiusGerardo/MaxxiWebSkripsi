$(function(){
   $("#tableFleet").bootstrapTable({
       columns:[
           {
               title: "No",
               field: "No",
               align: "center"
           }, {
               title: "Nomor Polisi",
               field: "NoPolisi",
               align: "center"
           }, {
               title: "Nama Supir",
               field: "NamaSupir",
               align: "left",
               halign: "center"
           }, {
               title: "Nick Name",
               field: "NickName",
               align: "left",
               halign: "center"
           }, {
               title: "Jenis Armada",
               field: "JenisArmada",
               align: "left",
               halign: "center"
           }, {
               title: "Tahun Pembuatan",
               field: "TahunPembuatan",
               align: "center",
               sortable: true
           }
       ]
   }); 
});

