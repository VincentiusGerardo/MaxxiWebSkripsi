$(document).ready(function(){
    $("#tableSubRoles").bootstrapTable({
        columns:[
            {
                title: ' <input type="checkbox" class="selectall">',
                align: 'center'
            },{
                title: 'Nama Sub Menu',
                field: 'NamaSubMenu',
                align: 'left',
                halign: 'center',
                sortable: true,
                width: "50%"
            }
        ]
    });
});