<?php /* Template Name: Submit project */   get_header();

?>


<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>



<link rel="stylesheet" href="
https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
<link rel="stylesheet" href="//cdn.materialdesignicons.com/3.8.95/css/materialdesignicons.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

<!--
<script src="/wp-content/themes/increaseestate/includes/scripts/ramjet.js" type="text/javascript"></script> -->


<!-- <div class="row" style="margin-top:150px;">


<div  id="click-transform1" class="col-6">

<div style="padding:50px 100px; cursor:pointer;" class="border rounded min-desktop-height first-link">
<p class="h4 text-secondary font-weight-light text-left"> I. Activitati implementate in prezent in domeniul educatiei financiare </p>
</div>

</div>


<div id="click-transform2" class="col-6">

<div class="col-12">

<div style="padding:50px 100px; cursor:pointer;" class="border rounded min-desktop-height secondary-link">
<p class="h4 text-secondary font-weight-light"> II.&nbsp;Propuneri de actiuni viitoare in domeniul educatiei &#8203;&#8203;financiare <br> </p>
</div>

</div>

</div>

</div> -->



<?php

//Template PHP trimitere POST - activitati implementate

get_template_part('template-parts/page/content', 'activitati');
get_template_part('template-parts/page/content', 'propuneri');
?>


<div class="row " style="margin-top:150px; padding-bottom:150px;">
    <div id="click-transform1" class="col-12 col-md-6">

        <div style="padding:50px 100px; cursor:pointer; border-bottom: 6px solid transparent; display:block; transition:0.3s" class=" rounded min-desktop-height first-link">
            <p class="h4 text-secondary font-weight-light text-left"> I. Activitati implementate in prezent in domeniul educatiei financiare </p>
        </div>

    </div>

    <div id="click-transform2" class="col-12 col-md-6">

        <div style="padding:50px 100px; cursor:pointer; border-bottom: 6px solid transparent ; display:block; transition:0.3s" class=" rounded min-desktop-height second-link">
            <p class="h4 text-secondary font-weight-light text-left">  II. Propuneri de actiuni viitoare in domeniul educatiei ​​financiare  </p>
        </div>

    </div>
</div>
<!--
<div id="success-activitati" style="padding:50px 100px; cursor:pointer;" class="border rounded min-desktop-height first-link">
<p class="h4  font-weight-light text-left text-primary"> I. Activitati implementate in prezent in domeniul educatiei financiare </p>
</div> -->

<div id="wrap" class="bg-white-content">

    <div id="content" class="shadow p-4 p-sm-5 bg-white rounded " style="overflow:hidden;">





        <div id="main">

            <div class="single-post-item">
                <h1 class="text-center">Încarcă proiect</h1>





                <div class="inner-content">
                    <!-- New Post Form -->
                    <div id="postbox" >

                        <div class="row"  >
                            <div class="col-12">
                                <div class="stepwizard">
                                    <div class="stepwizard-row setup-panel">
                                        <div class="stepwizard-step stepwizard-step-1">
                                            <a href="#step-1" type="button" class="first-child btn btn-primary btn-circle">1</a>

                                        </div>
                                        <div class="stepwizard-step stepwizard-step-2">
                                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>

                                        </div>
                                        <div class="stepwizard-step stepwizard-step-3">
                                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>

                                        </div>

                                        <div class="stepwizard-step stepwizard-step-4">
                                            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>

                                        </div>
                                        <div class="stepwizard-step stepwizard-step-5">
                                            <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>

                                        </div>

                                        <div class="stepwizard-step stepwizard-step-6">
                                            <a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php

                        //Template form pentru activitati

                        get_template_part('template-parts/page/content', 'activitatiform');
                        get_template_part('template-parts/page/content', 'propuneriform');

                        ?>


                    </div>
                </div>
            </div>
        </div>



        <div class="row mt-4">
            <div class="col-6 d-flex justify-content-start">
                <div class="previous-form">
                    <button class="btn btn-primary rounded" type="button" name="button" disabled="disabled">
                        Previous
                    </button>
                </div>

            </div>
            <div class="col-6 justify-content-end d-flex">
                <div class="next-form">
                    <button class="btn btn-primary rounded" type="button" name="button">
                        Next
                    </button>
                    <label style="display:none; " for="submit"
                    class="label-publish btn-success btn shadow">PUBLISH</label>
                <label style="display:none; " for="submit-2"
                class="label-publish-propuneri btn-success btn shadow">PUBLISH</label>
                </div>
            </div>



        </div>




    </div> <!-- content -->
</div>
<div class="Aligner">
    <div class="Aligner-item" >
        <h1 class="text-success font-weight-bold">Proiectul a fost încărcat</h1>
        <p class="text-center">pagina se va reîncărca</p>
    </div>
</div>

<style media="screen">

.Aligner {
  display: none;
  align-items: center;
  justify-content: center;
  position: fixed;
  left: 0;
  top: 0;
  z-index: 99999;
  background: #8080807a;
  width: 100%;
  height: 100%;
}

.Aligner-item {
  max-width: 50%;
}


/* */

#wrap{
    /* margin-top: 150px; */
    margin-bottom:150px;
    max-width: 650px;
    display: flex;
    margin-left: auto;
    margin-right: auto;
    justify-content: center;
}



/* checkbox */
ul{
    padding:0;
}

li{
    list-style: none;
}

.pretty .state label:after, .pretty .state label:before{
    top: 0 !important;
}
.pretty.p-icon .state .icon{
    top:-2px !important;
}
.pretty.p-icon .state .icon:before{
    margin: 1px 0;
}
.pretty input:checked~.state.p-success label:after, .pretty.p-toggle .state.p-success label:after{
    background-color:#b3696d !important;
}

.pretty{
    padding-bottom:10px;
    white-space: normal;
}

ul.acoperire,
ul.anvergura,
ul.instrumentul,
ul.resurse,
ul.institutia{
    display:none;
}



/* input */
.inp-1, .inp-2{
    display:none;
    padding-top:10px;
}

input[type="number"],
input[type="date"],
input[type="text"],
input[type="email"] {
    box-sizing: border-box;
    width: 100%;
    height: calc(3em + 2px);
    margin: 0 0 1em;
    padding: 1em;
    border: 1px solid #ccc;
    border-radius: 1.5em;
    background: #fff;
    resize: none;
    outline: none;
}
input[type="number"]:focus,
input[type="date"]:focus {
    border-color: #b3696d;
}
input[type="number"]:focus + label[placeholder]:before,
input[type="date"]:focus + label[placeholder]:before {
    color: #b3696d;
}
input[type="number"]:focus + label[placeholder]:before,
input[type="number"]:valid + label[placeholder]:before,
input[type="date"]:focus + label[placeholder]:before,
input[type="date"]:valid + label[placeholder]:before {
    transition-duration: 0.2s;
    -webkit-transform: translate(0, -1.5em) scale(0.9, 0.9);
    transform: translate(0, -1.5em) scale(0.9, 0.9);
}
input[type="number"]:invalid + label[placeholder][alt]:before,
input[type="date"]:invalid + label[placeholder][alt]:before  {
    content: attr(alt);
}
input[type="number"] + label[placeholder],
input[type="date"] + label[placeholder] {
    display: block;
    pointer-events: none;
    line-height: 1.25em;
    margin-top: calc(-3em - 2px);
    margin-bottom: calc((3em - 1em) + 2px);
}
input[type="number"] + label[placeholder]:before,
input[type="date"] + label[placeholder]:before {
    content: attr(placeholder);
    display: inline-block;
    margin: 0 calc(1em + 2px);
    padding: 0 2px;
    color: #898989;
    white-space: nowrap;
    transition: 0.3s ease-in-out;
    background-image: linear-gradient(to bottom, #fff, #fff);
    background-size: 100% 5px;
    background-repeat: no-repeat;
    background-position: center;
}


/* functionalitate stepped formular */

.shadow.p-5.bg-white:hover{
    box-shadow: 0 1rem 5rem rgba(0, 0, 0, .3) !important;
    transition: 0.5s linear;
}

.shadow.p-5.bg-white{
    transition: 0.5s linear;
}

.hidden-post{

    opacity:0;
    visibility:hidden;
    /* transition: visibility 0s 1s, opacity 1s linear; */
    height:0;

}

.active-post{

    opacity:1;
    height:auto !important;
    visibility:visible;
    transition: opacity 1s linear;
    animation-duration: 1s;
    animation-name: slidein;
}

.btn-active{
    color: #fff;
    background-color: #911919 !important;
    border-color: #911919 !important;
    z-index:9;
}

.btn-active:before {
    top: 14px;
    left: -50px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #911919;
    animation-duration: 2s;
    animation-name: slideline;
}



a.btn.btn-primary.btn-circle:before{
    top: 14px;
    left: -25px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 70%;
    height: 1px;
    background-color: #911919;

}

a.btn.btn-primary.btn-circle.first-child:before{
    left: 0px;
    width: 49%;
}

a.btn.btn-circle{
    cursor:default !important;
    pointer-events:none;
}
a.btn.btn-circle:hover{
    background:#911a18 !important;
    color:white !important;

}

@keyframes slidein {
    from {
        margin-left: 100%;
        width: 300%;
    }

    to {
        margin-left: 0%;
        width: 100%;
    }
}

@keyframes slideline {
    from {
        margin-left: -60%;
        width: 100%;
    }

    to {
        margin-left: 0%;
        width: 100%;
    }
}



button, html [type="button"], [type="reset"], [type="submit"]{
    -webkit-appearance: meter;
}

.btn-circle[disabled="disabled"]{
    background:#d4bcbc;
}

.stepwizard-step p {
    margin-top: 10px;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 100%;
    position: relative;
    margin: 25px 0;
}
.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}

#postbox{
    min-height:440px;
}



.file-area {
    width: 100%;
    position: relative;
}
.file-area input[type=file] {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    opacity: 0;
    cursor: pointer;
}
.file-area .file-dummy {
    width: 100%;
    padding: 30px;
    background: rgb(212, 188, 188);
    border: 2px dashed rgb(145, 26, 24);
    text-align: center;
    transition: background 0.3s ease-in-out;
}
.file-area .file-dummy .success {
    display: none;
}
.file-area:hover .file-dummy {
    background: rgba(255, 255, 255, 0.1);
}
.file-area > input[type=file]:focus + .file-dummy {
    outline: 2px solid rgba(255, 255, 255, 0.5);
    outline: -webkit-focus-ring-color auto 5px;
}
.file-area > input[type=file].valid + .file-dummy {
    border-color: rgba(0, 255, 0, 0.4);
    background-color: rgba(0, 255, 0, 0.3);
}
.file-area > input[type=file].valid + .file-dummy .success {
    display: inline-block;
}
.file-area > input[type=file].valid + .file-dummy .default {
    display: none;
}


/* focus on div */
.active-first{
    border: 1px solid #B3696D !important;
    border-bottom: 5px solid #B3696D !important;

}
.active-first > p{
    color:#B3696D !important;
}
#new_post,
#new_post2{
    display:none;

}

label.error{
    color:red;
}

</style>

<script type="text/javascript">



jQuery(document).ready(function($) {


   $("form[data-form-validate='true']").each(function() {
        $(this).validate({
                // rules: {
                //     nume: "required",
                //     functie: "required",
                //     telefon: "required",
                //     email: "required",
                //     "nume-2": "required",
                //     "functie-2": "required",
                //     "telefon-2": "required",
                //     "email-2": "required"
                // },
                //
                // messages: {
                //     nume: "Numele este obligatoriu",
                //     functie: "Acest camp este obligatoriu",
                //     telefon: "Numarul de telefon este obligatoriu",
                //     email: "Adresa de email este obligatorie",
                //     "nume-2": "Numele este obligatoriu",
                //     "functie-2": "Acest camp este obligatoriu",
                //     "telefon-2": "Numarul de telefon este obligatoriu",
                //     "email-2": "Adresa de email este obligatorie"
                //
                // }
            })
        })


    // $("#new_post").validate({
    //     rules: {
    //         nume: "required",
    //         functie: "required",
    //         telefon: "required",
    //         email: "required",
    //         "nume-2": "required",
    //         "functie-2": "required",
    //         "telefon-2": "required",
    //         "email-2": "required"
    //     },
    //     messages: {
    //         nume: "Numele este obligatoriu",
    //         functie: "Acest camp este obligatoriu",
    //         telefon: "Numarul de telefon este obligatoriu",
    //         email: "Adresa de email este obligatorie",
    //             "nume-2": "Numele este obligatoriu",
    //             "functie-2": "Acest camp este obligatoriu",
    //             "telefon-2": "Numarul de telefon este obligatoriu",
    //             "email-2": "Adresa de email este obligatorie"
    //
    //     }
    // })
    //
    // $("#new_post2").validate({
    //     rules: {
    //         "nume-2": "required",
    //         "functie-2": "required",
    //         "telefon-2": "required",
    //         "email-2": "required"
    //     },
    //     messages: {
    //         "nume-2": "Numele este obligatoriu",
    //         "functie-2": "Acest camp este obligatoriu",
    //         "telefon-2": "Numarul de telefon este obligatoriu",
    //         "email-2": "Adresa de email este obligatorie"
    //
    //     }
    // })


    $.validator.messages.required = 'Acest camp este obligatoriu';


    n=1;
    console.log(n);




    $( ".next-form" ).on( "click", function() {


         if ($("form[data-form-validate='true']").valid() === false)  {
             alert("Toate câmpurile trebuie completate !")
         } else  {


         $("#post_thumbnail").attr("required", "required");
         $("#upload_attachment").attr("required", "required");
         $("#title").attr("required", "required");
         $("#date_min").attr("required", "required");
         $("#date_max").attr("required", "required");
         $("#beneficiari").attr("required", "required");




          $("#post_thumbnail-2").attr("required", "required");
          $("#upload_attachment-2").attr("required", "required");
          $("#title-2").attr("required", "required");





        $('html, body').animate({
            scrollTop: $(element2).offset().top - 100
        }, 0);

        // validator = document.querySelector('#new_post').reportValidity();
        // validator2 = document.querySelector('#new_post2').reportValidity();
        //
        // if (validator === true || validator2 === true) {

                if ($(".step-"+ n +"").hasClass("active-post")) {
                    $(".step-"+ n +"").removeClass("active-post");
                    n=n+1;
                    $(".step-"+ n +"").addClass("active-post");
                    $(".previous-form > button").prop("disabled", false);

                    $(".stepwizard-step-" + n + " > a").addClass("btn-active");
                    $(".stepwizard-step-" + n + " > a").removeClass("btn-default");

                    if (n===6){ // schimba in functie de cati pasi sunt
                        $(".next-form > button").prop("disabled", true);
                        $(".next-form > button").hide();
                        if ($("#new_post").css('display') == ('block')) {
                            $(".label-publish").show()
                        }
                        else if ($("#new_post2").css('display') == ('block')){
                            $(".label-publish-propuneri").show()
                        }


                    }
                }
                console.log("NEXT " + n);


        // } else {
        //
        //             alert("Toate câmpurile din primul pas al formularului sunt obligatorii");
        //
        //

    }



    });


    $( ".previous-form" ).on( "click", function() {



        $("#post_thumbnail").removeAttr("required");
        $("#upload_attachment").removeAttr("required");
        $("#title").removeAttr("required");
        $("#date_min").removeAttr("required");
        $("#date_max").removeAttr("required");
        $("#beneficiari").removeAttr("required");



          $("#post_thumbnail-2").removeAttr("required");
          $("#upload_attachment-2").removeAttr("required");
          $("#title-2").removeAttr("required");



        $('html, body').animate({
            scrollTop: $(element2).offset().top - 100
        }, 0);

        if ($(".step-"+ n +"").hasClass("active-post")) {
            $(".step-"+ n +"").removeClass("active-post");
            $(".stepwizard-step-" + n + " > a").removeClass("btn-active");

            n=n-1;
            $(".step-"+ n +"").addClass("active-post");
            $(".next-form > button").prop("disabled", false);
            console.log("PREVIOUS "+n);


            if (n===5){ // schimba in functie de cati pasi sunt -1
                //$(".next-form > button").prop("disabled", true);
                $(".next-form > button").show();
                        if ($("#new_post").css('display') == ('block')) {
                                $(".label-publish").hide()
                        }
                        else if ($("#new_post2").css('display') == ('block')){
                                $(".label-publish-propuneri").hide()
                        }
            }

            if (n===1){
                $(".previous-form > button").prop("disabled", true);
            }

        }



    });




    var element1 = document.getElementById('click-transform1'),
     element3 = document.getElementById('click-transform2')
    element2 = document.getElementById('wrap');

    $(element2).hide();

    $( element1 ).on( "click", function() {
        $(element2).fadeIn();
        $("#new_post").attr("data-form-validate", "true");
        $("#new_post2").removeAttr("data-form-validate");

        $("#new_post2").fadeOut();
        $("#new_post").fadeIn();
        $(".first-link").addClass("active-first");
        $(".second-link").removeClass("active-first");
        $('html, body').animate({
            scrollTop: $(element2).offset().top - 100
        }, 1000);
        //new FroalaEditor('textarea#description')
    });


        $( element3 ).on( "click", function() {

            $("#new_post2").attr("data-form-validate", "true");
            $("#new_post").removeAttr("data-form-validate");

            $(element2).fadeIn();
            $("#new_post").fadeOut();
            $("#new_post2").fadeIn();
            $(".second-link").addClass("active-first");
            $(".first-link").removeClass("active-first");
            $('html, body').animate({
                scrollTop: $(element2).offset().top - 100
            }, 1000);
            //new FroalaEditor('textarea#description')
        });



    $( ".label-publish" ).on( "click", function() {
        $(".Aligner").css( "display", "flex" );
    });
    $( ".label-publish-propuneri" ).on( "click", function() {
        $(".Aligner").css( "display", "flex" );
    });



});




</script>


<?php
//

//         echo '<pre>';
//         print_r($_POST);
//         echo '<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>> </br>';
//         print_r($new_post);
//         echo '</pre>';
//         echo '<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>> </br>';
//         echo '<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>> </br>';
//         echo '<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>> </br>';
//     echo '<pre>';
//         print_r($_FILES);
//     echo '</pre>';
//     echo 'ATTACH </br>';
//         echo '<pre>';
//                 echo '$attachment <br/>';
//             print_r($attachment);
//             echo 'filetype';
//                 echo '<pre>';
//             print_r ($filetype);
// echo '</pre>';
//         echo '</pre>';
//
//
//             echo 'upload overrides';
//         echo '<pre>';
//         print_r ( $upload_overrides );
//
//         echo '</pre>';
//



get_footer(); ?>
