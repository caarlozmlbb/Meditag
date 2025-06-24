@extends('layouts/layoutMaster')

@section('title', 'User List - Pages')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />

@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/app-user-list.js') }}"></script>
@endsection

@section('content')
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <div class="slide-container">

        <div class="wrapper">
            <div class="clash-card barbarian">
                <div class="clash-card__image clash-card__image--barbarian">
                    <model-viewer src="{{ asset('assets/models3D/albe_ains.glb') }}" alt="Modelo 3D" auto-rotate
                        camera-controls exposure="0.6" environment-image="neutral" shadow-intensity="0.8"
                        style="width: 100%; height: 300px; margin: 0 auto; background-color: transparent;">
                    </model-viewer>

                </div>
                <div class="clash-card__level clash-card__level--barbarian">Level 4</div>
                <div class="clash-card__unit-name">El enigma del cerebro de Albert Einstein</div>
                <div class="clash-card__unit-description">
                    The Barbarian is a kilt-clad Scottish warrior with an angry, battle-ready expression, hungry for
                    destruction. He has Killer yellow horseshoe mustache.
                </div>



            </div> <!-- end clash-card barbarian-->
        </div> <!-- end wrapper -->

        <div class="wrapper">
            <div class="clash-card archer">
                <div class="clash-card__image clash-card__image--archer">
                    <model-viewer src="{{ asset('assets/models3D/albe_ains.glb') }}" alt="Modelo 3D" auto-rotate
                        camera-controls exposure="0.6" environment-image="neutral" shadow-intensity="0.8"
                        style="width: 100%; height: 300px; margin: 0 auto; background-color: transparent;">
                    </model-viewer>
                </div>
                <div class="clash-card__level clash-card__level--archer">Level 5</div>
                <div class="clash-card__unit-name">El colapso de Michael Jordan</div>
                <div class="clash-card__unit-description">
                    The Archer is a female warrior with sharp eyes. She wears a short, light green dress, a hooded cape,
                    a
                    leather belt and an attached small pouch.
                </div>



            </div> <!-- end clash-card archer-->
        </div> <!-- end wrapper -->

        <div class="wrapper">
            <div class="clash-card giant">
                <div class="clash-card__image clash-card__image--giant">
                    <model-viewer src="{{ asset('assets/models3D/albe_ains.glb') }}" alt="Modelo 3D" auto-rotate
                        camera-controls exposure="0.6" environment-image="neutral" shadow-intensity="0.8"
                        style="width: 100%; height: 300px; margin: 0 auto; background-color: transparent;">
                    </model-viewer>
                </div>
                <div class="clash-card__level clash-card__level--giant">Level 5</div>
                <div class="clash-card__unit-name">El caso de Steve Jobs y la salud digestiva</div>
                <div class="clash-card__unit-description">
                    Slow, steady and powerful, Giants are massive warriors that soak up huge amounts of damage. Show
                    them a
                    turret or cannon and you'll see their fury unleashed!
                </div>



            </div> <!-- end clash-card giant-->
        </div> <!-- end wrapper -->

        <div class="wrapper">
            <div class="clash-card goblin">
                <div class="clash-card__image clash-card__image--goblin">
                    {{-- <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/goblin.png" alt="goblin" /> --}}
                    <model-viewer src="{{ asset('assets/models3D/albe_ains.glb') }}" alt="Modelo 3D" auto-rotate
                        camera-controls exposure="0.6" environment-image="neutral" shadow-intensity="0.8"
                        style="width: 100%; height: 300px; margin: 0 auto; background-color: transparent;">
                    </model-viewer>
                </div>
                <div class="clash-card__level clash-card__level--goblin">Level 5</div>
                <div class="clash-card__unit-name">El rescate en el Everest</div>
                <div class="clash-card__unit-description">
                    These pesky little creatures only have eyes for one thing: LOOT! They are faster than a Spring Trap,
                    and
                    their hunger for resources is limitless.
                </div>


            </div> <!-- end clash-card goblin-->
        </div> <!-- end wrapper -->

        {{-- <div class="wrapper">
            <div class="clash-card wizard">
                <div class="clash-card__image clash-card__image--wizard">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/wizard.png" alt="wizard" />
                </div>
                <div class="clash-card__level clash-card__level--wizard">Level 6</div>
                <div class="clash-card__unit-name">The Wizard</div>
                <div class="clash-card__unit-description">
                    The Wizard is a terrifying presence on the battlefield. Pair him up with some of his fellows and
                    cast
                    concentrated blasts of destruction on anything, land or sky!
                </div>



            </div> <!-- end clash-card wizard-->
        </div> <!-- end wrapper --> --}}

    </div> <!-- end container -->


    <style>
        @import url(https://fonts.googleapis.com/css?family=Lato:400,700,900);

        $border-radius-size: 14px;
        $barbarian: #EC9B3B;
        $archer: #EE5487;
        $giant: #F6901A;
        $goblin: #82BB30;
        $wizard: #4FACFF;

        *,
        *:before,
        *:after {
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(to bottom, rgba(140, 122, 122, 1) 0%, rgba(175, 135, 124, 1) 65%, rgba(175, 135, 124, 1) 100%) fixed;
            background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/coc-background.jpg') no-repeat center center fixed;
            background-size: cover;
            font: 14px/20px "Lato", Arial, sans-serif;
            color: #9E9E9E;
            margin-top: 30px;
        }

        .slide-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            justify-content: center;
            margin: auto;
            max-width: 1200px;
            padding: 20px;
            text-align: center;
        }

        @media (max-width: 576px) {
            .slide-container {
                grid-template-columns: 1fr;
                max-width: 400px;
                gap: 20px;
            }
        }

        .wrapper {
            padding-top: 20px;
            padding-bottom: 20px;

            &:focus {
                outline: 0;
            }
        }


        .wrapper {
            padding-top: 40px;
            padding-bottom: 40px;

            &:focus {
                outline: 0;
            }
        }


        .clash-card {
            background: white;
            width: 100%;
            max-width: 300px;
            margin: auto;
            border-radius: 50px;
            position: relative;
            text-align: center;
            box-shadow: -1px 15px 30px -12px black;
            z-index: 9999;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Efecto hover para las cards */
        .clash-card:hover {
            transform: translateY(-10px);
            box-shadow: -1px 25px 40px -12px rgba(0, 0, 0, 0.3);
        }

        .clash-card__image {
            position: relative;
            height: 230px;
            margin-bottom: 35px;
            border-radius: 50px;
            border-top-left-radius: $border-radius-size;
            border-top-right-radius: $border-radius-size;
        }

        .clash-card__image--barbarian {
            background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/barbarian-bg.jpg');

            img {
                width: 400px;
                position: absolute;
                top: -65px;
                left: -70px;
            }
        }

        .clash-card__image--archer {
            background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/archer-bg.jpg');

            img {
                width: 400px;
                position: absolute;
                top: -34px;
                left: -37px;
            }
        }

        .clash-card__image--giant {
            background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/giant-bg.jpg');

            img {
                width: 340px;
                position: absolute;
                top: -30px;
                left: -25px;
            }
        }

        .clash-card__image--goblin {
            background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/goblin-bg.jpg');

            img {
                width: 370px;
                position: absolute;
                top: -21px;
                left: -37px;
            }
        }

        .clash-card__image--wizard {
            background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/wizard-bg.jpg');

            img {
                width: 345px;
                position: absolute;
                top: -28px;
                left: -10px;
            }
        }

        .clash-card__level {
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 3px;
        }

        .clash-card__level--barbarian {
            color: $barbarian;
        }

        .clash-card__level--archer {
            color: $archer;
        }

        .clash-card__level--giant {
            color: $giant;
        }

        .clash-card__level--goblin {
            color: $goblin;
        }

        .clash-card__level--wizard {
            color: $wizard;
        }

        .clash-card__unit-name {
            font-size: 26px;
            color: black;
            font-weight: 900;
            margin-bottom: 5px;
        }

        .clash-card__unit-description {
            padding: 20px;
            margin-bottom: 10px;
        }



        .clash-card__unit-stats {

            color: white;
            font-weight: 700;
            border-bottom-left-radius: $border-radius-size;
            border-bottom-right-radius: $border-radius-size;

            .one-third {
                width: 33%;
                float: left;
                padding: 20px 15px;
            }

            sup {
                position: absolute;
                bottom: 4px;
                font-size: 45%;
                margin-left: 2px;
            }

            .stat {
                position: relative;
                font-size: 24px;
                margin-bottom: 10px;
            }

            .stat-value {
                text-transform: uppercase;
                font-weight: 400;
                font-size: 12px;
            }

            .no-border {
                border-right: none;
            }
        }

        .clearfix:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0;
        }

        .slick-prev {
            left: 100px;
            z-index: 999;
        }

        .slick-next {
            right: 100px;
            z-index: 999;
        }
    </style>

    <script>
        (function() {

            var slideContainer = $('.slide-container');

            slideContainer.slick();

            $('.clash-card__image img').hide();
            $('.slick-active').find('.clash-card img').fadeIn(200);

            // On before slide change
            slideContainer.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
                $('.slick-active').find('.clash-card img').fadeOut(1000);
            });

            // On after slide change
            slideContainer.on('afterChange', function(event, slick, currentSlide) {
                $('.slick-active').find('.clash-card img').fadeIn(200);
            });

        })();
    </script>


@endsection
