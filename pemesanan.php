<?php
 include 'navbar.php'; 
 include 'koneksi.php';
 
session_start();

if(!isset($_SESSION["login"])){
  header ("location:login.php");
  exit;
}
  

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id_gedung'])) {
        // ambil nilai id dari url dan disimpan dalam variabel $id
        $id_gedung = ($_GET["id_gedung"]);

        $query = "SELECT * FROM tbl_gedung WHERE id_gedung='$id_gedung'";
        $result = mysqli_query($koneksi, $query);
        if( mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result)  ;
        session_start();
       
        $_SESSION["id_gedung"] = $row["id_gedung"];
        }
    }


   
 
?>
 
    <head>
        <title>booking</title>
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
    <header class="catalog pt-5">
            <div class="container">
                <div class="catalog-heading text-uppercase text-center" style="padding-top:6rem;"><br>BOOKING</div>
            </div>
        </header>


   
    
        <div class="container pt-5 pb-5" >
            <div class="mt-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="alert alert-dark" role="alert">
                        <h4>Form Kegiatan</h4>
                    </div>
                    <div class="card">
                        <form action="proses_booking.php" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-label">Keterangan Kegiatan</div>
                                    <textarea name="kegiatan" class="form-control" id="kegiatan" cols="30"
                                        rows="2"></textarea>
                                </div>
                                <div class="form-group mt-4">
                                    <div class="form-label">Tgl Mulai</div>
                                    <input type="datetime-local" class="form-control" name="start" id="start">
                                </div>
                                <div class="form-group mt-4">
                                    <div class="form-label">Tgl Selesai</div>
                                    <input type="datetime-local" class="form-control" name="end" id="end">
                                </div>
                                <div class="form-group mt-4">
                                    <button type="submit" name="pesan"class="btn btn-success">Pesan</button>
                                </div>
                            </div>               
                            </div>
                        </form>
                    </div>
               
                <div class="col-lg-6">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
            integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: [     
                        <?php 
                         //mengambil data dari tabel jadwal
                        $data       = mysqli_query($koneksi,'SELECT * FROM booking');
                        //melakukan looping
                        while($d = mysqli_fetch_array($data)){     
                        ?>
                        {
                        title: 'SOLD', //menampilkan title dari tabel
                        start: '<?php echo $d['start']; ?>', //menampilkan tgl mulai dari tabel
                        end: '<?php echo $d['end']; ?>' //menampilkan tgl selesai dari tabel
                        },
                        <?php } ?>

                    ],
                    selectOverlap: function (event) {
                        return event.rendering === 'background';
                    }
                });
    
                calendar.render();
            });
        </script>
    </body>