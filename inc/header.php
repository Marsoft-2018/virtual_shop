

<header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">Nosotros</a></li>
                        <li class="dropdown megamenu-fw">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Productos</a>
                            <ul class="dropdown-menu megamenu-content" role="menu">
                                <li>
                                    <div class="row">
                                        <?php 
                                            $objSecciones = new Modelo_Secciones();

                                            foreach ($objSecciones->listar() as $seccion) { ?>
                                        <div class="col-menu col-md-3">
                                            <h6 class="title"><?php echo $seccion['nombre'] ?></h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <?php 
                                                        $objCategorias = new Modelo_Categorias();
                                                        $objCategorias->idSeccion = $seccion['id'];
                                                        foreach ($objCategorias->listar() as $categoria) { ?>
                                                            <li><a href="shop.html"><?php echo $categoria['nombre'] ?></a></li>

                                                        <?php                                                            
                                                        }                                                     
                                                    ?>
                                                </ul>
                                            </div>
                                        </div> 
                                    <?php }
                                            ?>                                        
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Tienda</a>
                            <ul class="dropdown-menu">
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                <li><a href="shop-detail.html">Shop Detail</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="service.html">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact-us.html">Contacto</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu"><a href="#">
						<i class="fa fa-shopping-cart"></i>
                            <span class="badge" id="cant-carrito">0</span>
					</a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box"  id="carrito">
                    <ul class="cart-list" id="carro-lista">
                        <li class="total">
                            <a href="#" class="btn btn-success hvr-hover btn-cart" id="procesar-pedido">VER COMPRA</a>
                            <span class="float-right"><strong>Total</strong>: $0.00</span>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default hvr-hover btn-cart" id="vaciar-carrito">VACIAR CARRITO</a>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>