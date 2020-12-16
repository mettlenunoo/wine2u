<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" type="image/png" href="{{asset('/landing/images/bvlogo.svg')}}">


    <title>Wine2u</title>

    <!-- Icofont -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Montserrat:300,400,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/landing/css/style.css')}}">


</head>

<body>

    <section class="vv" style="background-image: url('/page_assets/img/landing.png')">
        <div class="overlay"></div>
        {{-- <video src="{{asset('/landing/show2.mp4')}}" autoplay loop muted></video> --}}
        <div class="content1">
            <img src="/page_assets/img/wine2ulogo.svg" alt="" class="img-fluid w-30">


            <div class="col-12 col-md-12 mx-auto pt-5 text-center">
                <h4 class="headhead">COMING SOON</h4>

                <p class="parapra py-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati debitis. <br> 
                    Qui labore nostrum eius accusamus quam veritatis libero exercitationem! Sunt.
                </p>
                <p>Enter your email for a chance to win a stay.</p>

                <p class="col-12 col-md-12 mx-auto" id="success"></p>
                
            </div>

           
            <div class="col-12 col-md-8 mx-auto">
                <p id="success"></p>
                <form id="newsletter" mt>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" id="email" placeholder="Enter Your Email"
                            aria-label="Recipient's username" aria-describedby="button-addon2" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary btn-bv"  type="submit" id="subscribe">
                                <img src="{{asset('/landing/images/righticon.svg')}}" class="img-fluid px-2" alt="">
                            </button>
                            {{-- <span class="subscribing"></span>
                            <span class="thanks"> Thank you. You have been subscribed!</span> --}}
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script>
        $('#newsletter').submit(function (event) {
            event.preventDefault();

            document.getElementById('success').innerHTML = `Loading...`;

            var email = $("#email").val();

            var formData = new FormData();
            formData.append('email', email);


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: '/subscribe',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    
                    document.getElementById('success').innerHTML =
                        `<span class="alert alert-sm alert-success alert-dismissible fade show" role="alert">
          Subscription was succesful
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </span>`;
                    $('#newsletter').trigger("reset");

                },
                error: console.error
            });

        });

    </script>

  

</body>

</html>
