<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php
include './partials/head.php';
?>

<body class="animsition">
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Register
        </h2>
    </section>


    <!-- Content page -->
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="flex-w flex-tr justify-content-center">
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form action="handler/handle_login.php" method="post">
                        <div class="form-group">
                            <label for="email" class="p-l-5" style="font-weight: 600">Email</label>
                            <div class="bor8 m-b-20 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-116 p-lr-28" id="email" type="text" name="email" placeholder="Enter your email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="p-l-5" style="font-weight: 600">Password</label>
                            <div class="bor8 m-b-20 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-116 p-lr-28" id="password" type="password" name="password" placeholder="Enter your password">
                            </div>
                        </div>
                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- Map -->
    <div class="map">
        <div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
    </div>

    <!-- Footer  -->
    <?php
    include './partials/footer.php';
    ?>
    <script>
        document.querySelector('header').classList.add('header-v4');
        document.querySelector('.nav-home').classList.remove('active-menu');
        document.querySelector('.nav-contact').classList.add('active-menu');
    </script>
</body>

</html>