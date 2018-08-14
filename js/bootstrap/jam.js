$(function(){
    var jam = $("#Jam").text();
    var menit = $("#Menit").text();
    var detik = $("#Detik").text();

    setInterval(function(){ 

        jam = parseInt(jam);
        menit = parseInt(menit);

        detik++;

        if(detik>59){
            detik=0;
            menit++;

            if(menit>59){
                menit=0;
                 jam++;

                if(jam>23){
                    jam=0;
                }
            }
        }


        if(jam<10) jam = '0'+jam;
        if(menit<10) menit = '0'+menit;
        if(detik<10) detik = '0'+detik;

        $("#Jam").text(jam);
        $("#Menit").text(menit);
        $("#Detik").text(detik);
    },1000);
});