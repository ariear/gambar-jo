<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gambar JO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>
<body class="bg-[#0078AA] flex justify-center items-center min-h-screen">

    <div class="bg-[#3AB4F2] w-[90vw] sm:w-[500px] rounded-xl">
        <h2 class="text-2xl font-semibold  pl-4 pt-3 mb-3 text-white text-center">Make your image online</h2>
        <form action="/action.php" method="post" enctype="multipart/form-data">
            <div class="flex flex-col p-4">
                <input type="file" name="imageupload" onchange="loadFile(event)" class="block text-sm text-slate-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-[violet-50] file:text-[#0078AA]
                    hover:file:bg-violet-100 mb-7">
                    <?php if (isset($_GET['image'])) { ?>
                        <img src="/images/<?php echo $_GET['image'] ?>" class="mb-5" id="output"/>
                        <input type="text" class="p-3 mb-3 text-center bg-slate-300 rounded-full" value="https://gambarjo.herokuapp.com/images/<?php echo $_GET['image'] ?>" id="linkimg" data-clipboard-target="#linkimg" readonly >
                    <?php }else { ?>
                        <img class="mb-5" id="output"/>
                    <?php }  ?>
                <button type="submit" class="bg-white p-3 rounded-full font-medium">Upload</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>
<script>
    new ClipboardJS('#linkimg');

  const loadFile = (event) => {
    let output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) 
    }
  };

  toastr.options = {
"closeButton": false,
"debug": false,
"newestOnTop": false,
"progressBar": false,
"positionClass": "toast-top-right",
"preventDuplicates": false,
"onclick": null,
"showDuration": "300",
"hideDuration": "700",
"timeOut": "2000",
"extendedTimeOut": "1000",
"showEasing": "swing",
"hideEasing": "linear",
"showMethod": "fadeIn",
"hideMethod": "fadeOut"
}

  document.getElementById('linkimg').addEventListener('click' , (e) => {
      toastr.success('Image copy successfully')
  })

  <?php if (isset($_GET['image'])) { ?>
    toastr.success('Image upload successfully')
  <?php } ?>
</script>
</body>
</html>