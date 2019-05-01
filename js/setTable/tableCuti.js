$(function(){
    $(".tableC").bootstrapTable({
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
                title: "Keterangan",
                field: "Keterangan",
                align: "center"
            }, {
                title: "Status Cuti",
                field: "StatusCuti",
                align: "center"
            }
        ]
    }); 
 });