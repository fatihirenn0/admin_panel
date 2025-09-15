<section class="about">
    <div class="about_two_bg about_one_padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about_man_image">
                        <img class="static-image" src="/theme16/images/about.jpg" alt="{{ __('Anasayfa Hakkımızda Görseli') }}">
                        <div class="about_logo_image">
                            <img src="/storage/{{ $settings->get('logo_white') }}" alt="Logo">
                        </div>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-5">
                    <div class="heading_common heading_primary_color" data-aos="fade-up">
                        <h5>{{ __('Hakkımızda') }}</h5>
                        <h4>{{ __('Güvenilir Hukuki Uzmanlık, Her Davada Titizlikle Yaklaşım') }}</h4>
                        <p>   {{ __('Avukatlık, kişilerin ya da kurumların hak ve menfaatlerini korumak, hukuki sorunlarına çözüm üretmek ve yargı mercileri ile resmi kurumlarda onları temsil etmek amacıyla yapılan meslektir. Avukat, hukuki
                            bilgi ve deneyimiyle müvekkiline yol gösterir, dava açar veya açılan davada savunma yapar, gerekli dilekçe ve belgeleri hazırlar. Bunun yanında sözleşme düzenleme, hukuki danışmanlık sağlama, icra ve noter
                            işlemlerinde müvekkil adına hareket etme gibi görevleri vardır.') }}</p>
                    </div>
                    <div class="about_list" data-aos="fade-up">
                        <ul>
                            <li>
                                <i class="ion-android-done" aria-hidden="true"></i>
                                <p>{{ __('Afet Sigortası ve Tazminat Davaları') }}</p>
                            </li>
                            <li>
                                <i class="ion-android-done" aria-hidden="true"></i>
                                <p> {{ __('Rüşvet ve Yolsuzluk Suçları') }}</p>
                            </li>
                            <li>
                                <i class="ion-android-done" aria-hidden="true"></i>
                                <p> {{ __('Döviz Mevzuatı ve Kripto Hukuku') }}</p>
                            </li>
                        </ul>
                        <a href="{{ route(getOtherFullLink('contact')) }}" class="btn_one btn">{{ __('Bize Ulaşın') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
