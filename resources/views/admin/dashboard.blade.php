@extends('admin.layout.app')
@section('content')
    <style>
        /*** Dashboard Card Color Start ***/
        .card .Dash-card1 {
            background: #777ae0 !important;
        }

        .card .Dash-card1 .Dash-color1 {
            color: #fff !important;
            font-weight: bold;
        }

        .card .Dash-card2 .Dash-color2 {
            color: #fff !important;
            font-weight: bold;
        }

        .card .Dash-card3 .Dash-color3 {
            color: #fff !important;
            font-weight: bold;
        }


        .card .Dash-card4 .Dash-color4 {
            color: #fff !important;
            font-weight: bold;
        }

        .card .Dash-card5 .Dash-color5 {
            color: #fff !important;
            font-weight: bold;
        }


        .card .Dash-card6 .Dash-color6 {
            color: #fff !important;
            font-weight: bold;
        }

        .card .Dash-card7 .Dash-color7 {
            color: #fff !important;
            font-weight: bold;
        }

        .card .Dash-card8 .Dash-color8 {
            color: #fff !important;
            font-weight: bold;
        }


        .card .Dash-card2 {
            background: #9f64d6 !important;
        }

        .card .Dash-card3 {
            background: #1eb100 !important;
        }

        .card .Dash-card4 {
            background: #dd8853 !important;
        }

        .card .Dash-card5 {
            background: #95774c !important;
        }

        .card .Dash-card6 {
            background: #84888b !important;
        }

        .card .Dash-card7 {
            background: #e80033 !important;
        }

        .card .Dash-card8 {
            background: #cb648b !important;
        }

        .card .Dash-card9 {
            background: #6eb3d9 !important;
        }

        .card .Dash-card10 {
            background: #22e840 !important;
        }

        .card .Dash-card11 {
            background: #800000 !important;
        }

        .card .Dash-card12 {
            background: #cca92c !important;
        }

        .card.new-style {
            margin-bottom: 10px;
        }

        .side-menu__item.new-style {
            padding: 10px 19px 10px 15px;
        }

        .side-menu .new-style .side-menu__icon {
            line-height: 27px;
            text-align: start;
            width: 27px !important;
        }

        /*** Dashboard Card Color End ***/
        @keyframes opacity {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0.5
            }

            100% {
                opacity: 0;
            }
        }

        @keyframes blink {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(0.8);
            }

            100% {
                transform: scale(1);
            }
        }

        .blinking-div {
            animation: blink 2s infinite;
            /* Adjust animation duration as needed */
        }

        .blinking-div1 {
            animation: blink 5s infinite;
            /* Adjust animation duration as needed */
        }

        .blinking-div2 {
            animation: blink 10s infinite;
            /* Adjust animation duration as needed */
        }
    </style>
    <!--app-content open-->
    <div class="app-content">
        <section class="section">
            <!--page-header open-->



            <!--end row-->
        </section>
    </div>
    <!--app-content closed-->
@endsection
