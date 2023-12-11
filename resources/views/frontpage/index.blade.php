<!DOCTYPE html>
<html lang="en">
    

<head>
    <title>TesMap PicupPal</title>
    <base target="_top">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quick Start - Leaflet with Tailwind CSS</title>

    <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@3.0.10/dist/esri-leaflet.js"></script>
    <script src="https://unpkg.com/esri-leaflet-vector@4.2.2/dist/esri-leaflet-vector.js"></script>

    <!-- Load Esri Leaflet Geocoder from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@3.1.4/dist/esri-leaflet-geocoder.css">
    <script src="https://unpkg.com/esri-leaflet-geocoder@3.1.4/dist/esri-leaflet-geocoder.js"></script>

    <!-- Tambahkan jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <style>
        /* Any additional styles can go here */
        /* Override Leaflet's default size */
        #map {
            width: 900px;
            height: 400px;
        }
    </style>
</head>

<body class="bg-gray-100">

    <section  class="text-center">
        <div class="font-bold text-4xl my-4 mb-8">
            <h1>Hello</h1>
        </div>
    </section>

    <!-- Map container -->
    <section class="flex item-center justify-center ">
        <div id="map" class="max-w-full"></div>
    </section>
{{-- 
    <form>
        <label for="messageSelect">Pilih Pesan:</label>
        <select id="messageSelect" name="messageSelect">
            <option value="pesan1">Pesan 1</option>
            <option value="pesan2">Pesan 2</option>
            <option value="pesan3">Pesan 3</option>
        </select>
        <br><br>
        <button onclick="redirectToWhatsApp()">Pesan via WhatsApp</button>
    </form>
    
    <script>
        function redirectToWhatsApp() {
            var selectedMessage = document.getElementById('messageSelect').value;
            var phoneNumber = '6283115942123'; // Ganti dengan nomor telepon yang valid
    
            var messageText = '';
    
            // Tentukan pesan yang sesuai berdasarkan pilihan select box
            switch (selectedMessage) {
                case 'pesan1':
                    messageText = 'Pesan untuk pilihan 1';
                    break;
                case 'pesan2':
                    messageText = 'Pesan untuk pilihan 2';
                    break;
                case 'pesan3':
                    messageText = 'Pesan untuk pilihan 3';
                    break;
                default:
                    messageText = 'Pesan default jika tidak ada pilihan yang dipilih';
            }
    
            // Encode pesan ke dalam URI dan buat URL WhatsApp
            var encodedMessage = encodeURIComponent(messageText);
            var whatsappURL = 'https://api.whatsapp.com/send?phone=' + phoneNumber + '&text=' + encodedMessage;
    
            // Redirect ke URL WhatsApp
            window.open(whatsappURL, '_blank');
        }
    </script> --}}
    


    <script>

    

        
        const map = L.map('map').setView([-8.409518, 115.188919], 10); // Centered around Bali

        L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(map);

      // Panggil data koordinat dari API
            $.getJSON('/getcoor', function(data) {
                $.each(data, function(index, coordinate) {
                    // Tambahkan marker berdasarkan koordinat dari database
                    L.marker([parseFloat(coordinate.latitude), parseFloat(coordinate.longitude)]).addTo(map).bindPopup('<b>Picup</b>Car').openPopup();
                });
            });


            // const marker = L.marker([-8.409518, 115.188919]).addTo(map) // Bali coordinates
            // .bindPopup('<b>Picup</b>Car').openPopup();


        // function onMapClick(e) {
        //     L.popup()
        //         .setLatLng(e.latlng)
        //         .setContent(`You clicked the map at ${e.latlng.toString()}`)
        //         .openOn(map);
        // } map.on('click', onMapClick);

        //ICON MARKER
        // var picupIcon = L.icon({
        //     iconUrl: 'https://img.icons8.com/?size=160&id=65480&format=png',

        //     iconSize:     [90, 90], // size of the icon
        //     iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
        //     shadowAnchor: [4, 62],  // the same for the shadow
        //     popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        // });

        // L.marker([-8.409518, 115.188919], {icon: picupIcon}).addTo(map);


        // Penggunaan Tiles itu untuk mengubah layers dari mapsnya, seperti dibawah ini.
            // Streart
        

        //Hybrid
        // googleHybrid = L.tileLayer('http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}',{
        //     maxZoom: 20,
        //     subdomains:['mt0','mt1','mt2','mt3']
        // });

            //Satelit
        // L.tileLayer('http://{s}.google.com/vt?lyrs=s&x={x}&y={y}&z={z}',{
        //     maxZoom: 20,
        //     subdomains:['mt0','mt1','mt2','mt3']
        // }).addTo(map);

        //Terrain
        // L.tileLayer('http://{s}.google.com/vt?lyrs=p&x={x}&y={y}&z={z}',{
        //     maxZoom: 20,
        //     subdomains:['mt0','mt1','mt2','mt3']
        // }).addTo(map);

        // Hybrid: s,h;
        // Satellite: s;
        // Streets: m;
        // Terrain: p;


    </script>

</body>

</html>
