$(function(){
    $("#tableK").bootstrapTable({
        columns:[
            {
                title: "Kode Karyawan",
                field: "ID_Karyawan",
                align: "center"
            }, {
                title: "Nama Karyawan",
                field: "NamaKaryawan",
                align: "center"
            }, {
                title: "Role",
                field: "Role",
                align: "center"
            }, {
                title: "Action",
                field: "Action",
                align: "center"
            }
        ]
    }); 
 });