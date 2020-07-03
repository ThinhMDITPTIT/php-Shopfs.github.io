            </div>
                <div class="clearfix" style="height: 50px"></div>
                <div class="container text-center">
                    <div class="col-md-3 bottom-content">
                        <a href=""><img src="./public/frontend/images/slide/logo2.jpg"></a>
                    </div>
                    <div class="col-md-3 bottom-content">
                        <a href=""><img src="./public/frontend/images/slide/logo3.jpg"></a>
                    </div>
                    <div class="col-md-3 bottom-content">
                        <a href=""><img src="./public/frontend/images/slide/logo9.jpg"></a>
                    </div>
                    <div class="col-md-3 bottom-content">
                        <a href=""><img src="./public/frontend/images/slide/logo10.jpg"></a>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="col-md-3 bottom-content">
                        <a href=""><img src="./public/frontend/images/slide/logo4.png"></a>
                    </div>
                    <div class="col-md-3 bottom-content">
                        <a href=""><img src="./public/frontend/images/slide/logo5.png"></a>
                    </div>
                    <div class="col-md-3 bottom-content">
                        <a href=""><img src="./public/frontend/images/slide/logo6.png"></a>
                    </div>
                    <div class="col-md-3 bottom-content">
                        <a href=""><img src="./public/frontend/images/slide/logo2.jpg"></a>
                    </div>
                </div>
                <!-- <div class="container">                  
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item"
                            src="./public/frontend/images/aaa.mp4?autoplay=1">
                        </iframe>
                        <video autoplay>
                            <source src="./public/frontend/images/aaa.mp4" type="video/mp4">
                        </video>
                    </div>
                </div> -->
                <div class="container-pluid">
                    <section id="footer">
                        <div class="container">
                            <div class="col-md-3" id="shareicon">
                                <ul>
                                    <li>
                                        <a href=""><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-8" id="title-block">
                                <div class="pull-left">
                                </div>
                                <div class="pull-right">
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="footer-button">
                        <div class="container-pluid">
                            <div class="container">
                                <div class="col-md-3" id="ft-about">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco 
                                    </p>
                                </div>
                                <div class="col-md-3 box-footer" >
                                    <h3 class="tittle-footer">CSKH</h3>
                                    <ul>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i> Giới thiệu</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i> Liên hệ </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-3 box-footer">
                                    <h3 class="tittle-footer">Cửa hàng</h3>
                                    <ul>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i> Giới thiệu</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i> Liên hệ </a>
                                        </li>
                                        <!-- <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i>  Contact </a>
                                        </li>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i> My Account</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i> Giới thiệu</a>
                                        </li> -->
                                    </ul>
                                </div>
                                <div class="col-md-3" id="footer-support">
                                    <h3 class="tittle-footer"> Liên hệ</h3>
                                    <ul>
                                        <li>
                                            <p><i class="fa fa-home" style="font-size: 16px;padding-right: 5px;"></i> 550 Ngã Tư Sở, Đống Đa, Hà Nội </p>
                                            <p><i class="sp-ic fa fa-mobile" style="font-size: 22px;padding-right: 5px;"></i> 012345678</p>
                                            <p><i class="sp-ic fa fa-envelope" style="font-size: 13px;padding-right: 5px;"></i> mdt@support.com</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="ft-bottom">
                        <p class="text-center">Design by SharkDuu !!! </p>
                    </section>
                </div>
            </div>
        </div>
        </div>      
        </div>
        <script  src="<?php echo base_url() ?>public/frontend/js/slick.min.js"></script>
    </body>
</html>
<script type="text/javascript">
    $(function() {
        $hidenitem = $(".hidenitem");
        $itemproduct = $(".item-product");
        $itemproduct.hover(function(){
            $(this).children(".hidenitem").show(100);
        },function(){
            $hidenitem.hide(500);
        })
    })
</script>