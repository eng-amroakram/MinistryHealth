@extends('parts.web.layout')
@section('content')
    <style>
        .highlight {
            height: 406px;
            padding-bottom: 0px;
            background: linear-gradient(155deg, #005fa1 5%, rgb(1, 161, 127) 87%);
        }

        .highlight-p {
            background: rgb(255, 255, 255);
            padding-bottom: 0px;
            padding-top: 0px;
        }

        .highlight-pb {
            background: rgb(255, 255, 255);
            padding: 0px;
        }

        .highlightpa {
            font-weight: bold;
        }

        #buttond {
            background: linear-gradient(143deg, #005fa1, #01a17f);
            box-shadow: 0px 0px 20px 5px #16f9f9;
            font-size: 15px;
        }

        #buttonstyle {
            background: linear-gradient(143deg, #005fa1, #01a17f);
            box-shadow: 0px 0px 14px 7px #16f9f9;
        }

        #header2 {
            background: linear-gradient(159deg, #019088 0%, #01a17f);
        }

        #parsection2 {
            color: rgb(255, 255, 255);
            font-size: 16px;
        }

        #sectionlast {
            background: linear-gradient(167deg, #00629f, #019e81 100%), rgb(255, 255, 255);
        }

        .divsectionlast {
            margin-right: auto;
            margin-left: auto;
            box-shadow: 0px 0px 20px 5px;
        }

        #formcoloring {
            background: linear-gradient(126deg, #005fa1, #01a17f);
        }
    </style>

    <section class="highlight-phone highlight-p" id="starting">
        <div class="container-sm">
            <section class="highlight-blue highlight">
                <div class="row">
                    <div class="col">
                        <div class="text-center intro">
                            <h2 class="text-center flash animated text-white">قسم السلامة المهنية</h2>
                            <p class="text-center flash animated highlightpa text-white">
                                اهلا وسهلا بكم في قسم السلامة المهنية - مدينة الملك سلمان الطبية</p>

                            @guest
                                <a class="btn btn-primary flash animated" id="buttond" role="button"
                                    href="{{ route('web.login') }}">تسجيل
                                    الدخول</a>
                            @endguest

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>

    <section class="highlight-blue highlight-pb" id="whoweare">
        <div class="container">
            <section class="highlight-blue" id="header2">
                <div class="intro">
                    <h2 class="text-center">من نحن؟</h2>
                    <p class="text-center" id="parsection2">نحن فريق قسم السلامة المهنية
                        في مدينة الملك سلمان الطبية</p>
                </div>
            </section>
        </div>
    </section>

    <section class="features-blue highlight-p" id="services">
        <div class="container">
            <section class="features-blue">

                <div class="intro">
                    <h2 class="text-center">خدماتنا</h2>
                    <p class="text-center text-white">يقدم قسم السلامة المهنية في مدينة الملك
                        سلمان الطبية مجموعة من الخدمات المميزة</p>
                </div>

                <div class="row features" style="padding: 20px;">

                    <div class="col-sm-6 col-md-4 text-center item">
                        <i class="fa fa-map-marker icon"></i>
                        <h3 class="name">جولات سنوية</h3>
                    </div>

                    <div class="col-sm-6 col-md-4 text-center item">
                        <i class="fa fa-clock-o icon"></i>
                        <h3 class="name">جولات يومية</h3>
                    </div>

                    <div class="col-sm-6 col-md-4 text-center item">
                        <i class="fa fa-list-alt icon"></i>
                        <h3 class="name">تشيكات شهرية</h3>
                    </div>

                    <div class="col-sm-6 col-md-4 text-center item">
                        <i class="fa fa-signal icon"></i>
                        <h3 class="name">الفرضيات</h3>
                    </div>

                    <div class="col-sm-6 col-md-4 text-center item">
                        <i class="fa fa-laptop icon"></i>
                        <h3 class="name">التدريب</h3>
                    </div>

                    <div class="col-sm-6 col-md-4 text-center item">
                        <i class="fa fa-leaf icon"></i>
                        <h3 class="text-center name">جولات بيئية</h3>
                    </div>

                </div>
            </section>
        </div>
    </section>

    <section class="highlight-pb" id="contactus">
        <div class="container">
            <section class="register-photo" id="sectionlast">
                <div class="form-container divsectionlast">

                    <div class="image-holder"></div>

                    <form method="post" id="formcoloring">

                        <h2 class="text-center text-white">
                            <strong>تواصل معنا</strong>
                        </h2>

                        <div class="mb-3">
                            <input class="form-control" type="email" name="name" placeholder="الاسم">
                        </div>

                        <div class="mb-3">
                            <input class="form-control" type="password" name="email" placeholder="الايميل">
                        </div>

                        <div class="mb-3">
                            <textarea class="form-control" name="message" placeholder="الرسالة" rows="3" cols="3"></textarea>
                        </div>

                        {{-- <div class="mb-3">
                            <div class="form-check">
                                <label class="form-check-label text-white">
                                    <input class="form-check-input" type="checkbox">I agree to the license terms.</label>
                            </div>
                        </div> --}}

                        <div class="mb-3">
                            <button class="btn btn-primary d-block w-100" type="submit" id="buttonstyle">إرسال</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </section>
@endsection
