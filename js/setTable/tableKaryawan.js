$(function(){
    $("#tableK").bootstrapTable({
        columns:[
            {
                title: "No",
                field: "No",
                align: "center"
            }, {
                title: "Tanggal Cuti",
                field: "TanggalCuti",
                align: "center"
            }, {
                title: "Tanggal Kembali",
                field: "TanggalKembali",
                align: "center"
            }, {
                title: "Jabatan",
                field: "Jabatan",
                align: "center"
            }, {
                title: "Action",
                field: "Action",
                align: "center"
            }
        ]
    }); 
 });