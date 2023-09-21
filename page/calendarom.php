    

 <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- bootstrap cdn  -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
            integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- fullcalendar css  -->
        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css' rel='stylesheet' />
    </head>
    
    <body>
        <div class="container-fluid">
            
                <!-- <div class="col-lg-4"> -->
                    <!-- <div class="alert alert-warning" role="alert">
                        <h4>Form Kegiatan</h4>
                    </div> -->
                    <!-- <div class="card">
                        <form action="proses.php" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-label">Keterangan Kegiatan</div>
                                    <textarea name="kegiatan" class="form-control" id="kegiatan" cols="30"
                                        rows="2"></textarea>
                                </div>
                                <div class="form-group mt-4">
                                    <div class="form-label">Tgl Mulai</div>
                                    <input type="datetime-local" class="form-control" name="mulai" id="mulai">
                                </div>
                                <div class="form-group mt-4">
                                    <div class="form-label">Tgl Selesai</div>
                                    <input type="datetime-local" class="form-control" name="selesai" id="selesai">
                                </div>
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div> -->
                <!-- </div> -->
                
                    <div id="calendar" class="col-lg-12 col-md-4 mt-4 mt-lg-4"></div>
              
            
        </div>

        <!-- Event Details Modal -->
    
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
            integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    eventClick: function(info) {

     var newtitle = info.event.title;                   
    // alert('Event: ' + newtitle);
    // alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
    // alert('View: ' + info.view.type);
    window.location.href = "../assetadmin/edit.php?kode_asset="+newtitle;

    // change the border color just for fun
    info.el.style.borderColor = 'red';
  },
                    initialView: 'dayGridMonth',
                    events: [ <?php 

//melakukan koneksi ke database
$koneksi    = mysqli_connect('localhost', 'root', '', 'assetmen');
//mengambil data dari tabel jadwal
$data       = mysqli_query($koneksi,'select * from asset where status = "Butuh Approve OM" limit 20');
//melakukan looping
$d = mysqli_fetch_array($data);

while($d = mysqli_fetch_array($data)){     
   
?>
{
    
title: '<?php echo $d['kode_asset']; ?>', //menampilkan title dari tabel
start: '<?php echo $d['tanggal_dibuat']; ?>', //menampilkan tgl mulai dari tabel
end: '<?php echo $d['tanggal_dibuat']; ?>',
color : 'green',

 //menampilkan tgl selesai dari tabel

},

<?php } ?>],
                    selectOverlap: function (event) {
                        return event.rendering === 'background';
                    }
                });
    
                calendar.render();
            });

           


        </script>
    </body>
    
    </html>