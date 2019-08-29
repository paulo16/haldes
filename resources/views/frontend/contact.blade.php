
@extends('frontend.layouts.default')

@section('head')
<title>Haldes | ccontact</title>
@endsection

@section('header')
    <header class="bg-grad-blue  mt70">
        <div class="container">
            <div class="row mt20 mb30">
                <div class="col-md-6 text-left">
                    <h3 class="color-light text-uppercase animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="100">CONTACTEZ NOUS<small class="color-light alpha7">Au besoin</small></h3>
                </div>
                <div class="col-md-6 text-right">
                    <div class="col-sm-8">
                        <ul class="breadcrumb">
                            <li>
                                <H3 class="color-light text-uppercase animated fadeInUp visible">Envoyez votre message</a></H3>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
<div>
<div class="container-fluid">
</div>
    <div id="compte" class="pt20 pb50">
        <div class="container">
                <div class="row">
                    <h3 class="text-center">
                        Merci de laisser votre message ici .
                        <small class="heading heading-dotted center-block"></small>
                    </h3>
                </div>
                <div class="row mt40">

                    <div class="col-md-5 col-sm-3 col-sm-offset-1 col-xs-6 animated zoomIn visible" data-animation="zoomIn" data-animation-delay="100">
                        <div class="content-box content-box-center mb20">
                            <span class="icon-streetsign color-pasific"></span>
                            <h4>Address</h4>
                            <p>Rue Abou Marouane Essaadi BP : Rabat Instituts 6208 - Haut Agdal - Rabat - Maroc</p>

                        </div>
                    </div>


                    <div class="col-md-6 col-sm-3 col-xs-6 animated zoomIn visible" data-animation="zoomIn" data-animation-delay="100">
                        <div class="content-box content-box-center mb20">
                            <span class="icon-envelope color-pasific"></span>
                            <h4>Contact</h4>
                            <p><a href="#">0537.68.88.93 / 0537.68.88.94</a></p>

                        </div>
                    </div>

                </div>

                <div class="row mt30">
                    <form name="contactform" id="contactForm" method="post" action="http://myboodesign.com/pasific/assets/php/send.php" class="positioned">

                                <!-- fullname start -->
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="nom" id="nom" class="input-md input-rounded form-control" placeholder="Nom Complet" maxlength="100" required="">
                                    </div>
                                </div>
                                <!-- fullname end -->

                                <!-- email start -->
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="input-md input-rounded form-control" placeholder="Adresse Email" maxlength="100" required="">
                                    </div>
                                </div>
                                <!-- email end -->

                                <!-- titre start -->
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="titre" id="titre" class="input-md input-rounded form-control" placeholder="Titre du Message" maxlength="100">
                                    </div>
                                </div>
                                <!-- titre end -->

                                <!-- textarea start -->
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="message" id="message" rows="7" required=""></textarea>
                                </div>
                                <!-- textarea end -->

                                <!-- button start -->
                                <div class="col-sm-12 mt10 text-center">
                                    <button type="submit" name="sendMessage" id="sendMessage" class="button-3d button-md button-block button-pasific hover-ripple-out">Envoyer Message</button>
                                </div>
                                <!-- button end -->

                                <div id="sendingMessage" class="statusMessage sending-message"><p>Sending your message. Please wait...</p></div>
                                <div id="successMessage" class="statusMessage success-message"><p>Thanks for sending your message! We'll get back to you shortly.</p></div>
                                <div id="failureMessage" class="statusMessage failure-message"><p>There was a problem sending your message. Please try again.</p></div>
                                <div id="incompleteMessage" class="statusMessage"><p>Please complete all the fields in the form before sending.</p></div>

                            </form>
                </div>

            </div>
    </div>
@stop