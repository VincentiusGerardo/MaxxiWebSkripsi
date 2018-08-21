$(function(){
   $("#tableCustomers").bootstrapTable({
       columns:[
           {
               title: "No",
               field: "No",
               align: "center"
           }, {
               title: "Nama Customer",
               field: "CustomerName",
               align: "left",
               halign: "center"
           }, {
               title: "Logo Customer",
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