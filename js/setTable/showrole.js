$(document).ready(function(){
    $("#tableRoles").bootstrapTable({
        columns:[
            {
                title: ' <input type="checkbox" class="selectall" onClick="toggle(this)">',
                align: 'center'
            },{
                title: 'Nama Menu',
                field: 'NamaMenu',
                align: 'left',
                halign: 'center',
                sortable: true,
                width: "50%"
            }
        ]
    });
});