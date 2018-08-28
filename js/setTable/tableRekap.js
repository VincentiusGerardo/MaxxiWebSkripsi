$(function(){
   $("#tableR").bootstrapTable({
       columns:[
           {
               title: "No",
               field: "No",
               align: "center"
           }, {
               title: "Tanggal",
               field: "Tanggal",
               align: "center"
           }, {
               title: "Clock In",
               field: "ClockIn",
               align: "center"
           }, {
               title: "Clock Out",
               field: "ClockOut",
               align: "center"
           }, {
               title: "Lama Bekerja",
               field: "LamaBekerja",
               align: "center"
           }
       ]
   }); 
});