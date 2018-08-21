$(function(){
   $("#msMenu").bootstrapTable({
       columns:[
           {
               title: "No",
               field: "No",
               align: "center"
           }, {
               title: "Nama Menu",
               field: "NamaMenu",
               align: "left",
               halign: "center"
           }, {
               title: "Action",
               field: "Action",
               align: "center"
           }
       ]
   }); 
});