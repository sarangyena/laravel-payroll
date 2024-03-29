<x-guest-layout>
    <video id="preview"></video>

    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script>
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
        Instascan.Camera.getCameras().then(function(cameras){
            if(cameras.length > 0){
                scanner.start(cameras[0]);
            }else{
                alert('No Cameras Found.');
            }
        }).catch(function(e){
            console.error(e);
        });
    </script>
</x-guest-layout>