$(function(){
    $("#tableFacility").bootstrapTable({
        columns: [
            {
                title: "No",
                field: "No",
                align: "center"
            }, {
                title: "Header",
                field: "Header",
                align: "left",
                halign: "center"
            }, {
                title: "Keterangan",
                field: "Keterangan",
                align: "left",
                halign: "center",
                width: "500px"
            }, {
                title: "Image",
                field: "Image",
                align: "center"
            }, {
                title: "Action",
                field: "Action",
                align: "center"
            }
        ]
    });
});