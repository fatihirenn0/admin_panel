<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <span class="text-primary">
                  <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                        fill="currentColor" />
                    <path
                        opacity="0.06"
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                        fill="#161616" />
                    <path
                        opacity="0.06"
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                        fill="#161616" />
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                        fill="currentColor" />
                  </svg>
                </span>
              </span>
            <span class="app-brand-text demo menu-text fw-bold ms-3">Vuexy</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="icon-base ti menu-toggle-icon d-none d-xl-block"></i>
            <i class="icon-base ti tabler-x d-block d-xl-none"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Page -->
        <li class="menu-item active">
            <a href="{{ route('admin.index') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-smart-home"></i>
                <div data-i18n="{{ __('Ana Sayfa') }}">{{ __('Ana Sayfa') }}</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-book"></i>
                <div data-i18n="Academy">{{ __('Blog Kategori') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.blog-categories.index') }}" class="menu-link">
                        <div data-i18n="Dashboard">{{ __('Blog Kategori Listesi') }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.blog-categories.create') }}" class="menu-link">
                        <div data-i18n="My Course">{{ __('Blog Kategori Ekle') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-file-text"></i>
                <div data-i18n="Academy">{{ __('Blog') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.blogs.index') }}" class="menu-link">
                        <div data-i18n="Dashboard">{{ __('Blog Listesi') }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.blogs.create') }}" class="menu-link">
                        <div data-i18n="My Course">{{ __('Blog Ekle') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-bell"></i>
                <div data-i18n="Academy">{{ __('Duyuru') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.announcements.index') }}" class="menu-link">
                        <div data-i18n="Dashboard">{{ __('Duyuru Listesi') }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.announcements.create') }}" class="menu-link">
                        <div data-i18n="My Course">{{ __('Duyuru Ekle') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-library"></i>
                <div data-i18n="Academy">{{ __('Katalog Kategori') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.catalog-categories.index') }}" class="menu-link">
                        <div data-i18n="Dashboard">{{ __('Katalog Kategori Listesi') }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.catalog-categories.create') }}" class="menu-link">
                        <div data-i18n="My Course">{{ __('Katalog Kategori Ekle') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-message-2-question "></i>
                <div data-i18n="Academy">{{ __('Soru Kategori') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.faq-categories.index') }}" class="menu-link">
                        <div data-i18n="Dashboard">{{ __('Soru Kategori Listesi') }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.faq-categories.create') }}" class="menu-link">
                        <div data-i18n="My Course">{{ __('Soru Kategori Ekle') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-help-hexagon"></i>
                <div data-i18n="Academy">{{ __('Soru Yönetimi') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.faqs.index') }}" class="menu-link">
                        <div data-i18n="Dashboard">{{ __('Soru Listesi') }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.faqs.create') }}" class="menu-link">
                        <div data-i18n="My Course">{{ __('Soru Ekle') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-news"></i>
                <div data-i18n="Academy">{{ __('Haber Kategori') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.news-categories.index') }}" class="menu-link">
                        <div data-i18n="Dashboard">{{ __('Haber Kategori Listesi') }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.news-categories.create') }}" class="menu-link">
                        <div data-i18n="My Course">{{ __('Haber Kategori Ekle') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-photo"></i>
                <div data-i18n="Academy">{{ __('Fotoğraf Kategori') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.photo-categories.index') }}" class="menu-link">
                        <div data-i18n="Dashboard">{{ __('Fotoğraf Kategori Listesi') }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.photo-categories.create') }}" class="menu-link">
                        <div data-i18n="My Course">{{ __('Fotoğraf Kategori Ekle') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-camera"></i>
                <div data-i18n="Academy">{{ __('Fotoğraf Yönetimi') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.photos.index') }}" class="menu-link">
                        <div data-i18n="Dashboard">{{ __('Fotoğraf Listesi') }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.photos.create') }}" class="menu-link">
                        <div data-i18n="My Course">{{ __('Fotoğraf Ekle') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-video"></i>
                <div data-i18n="Academy">{{ __('Video Kategori') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.video-categories.index') }}" class="menu-link">
                        <div data-i18n="Dashboard">{{ __('Video Kategori Listesi') }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.video-categories.create') }}" class="menu-link">
                        <div data-i18n="My Course">{{ __('Video Kategori Ekle') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-package"></i>
                <div data-i18n="Academy">{{ __('Ürün Kategori') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.product-categories.index') }}" class="menu-link">
                        <div data-i18n="Dashboard">{{ __('Ürün Kategori Listesi') }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.product-categories.create') }}" class="menu-link">
                        <div data-i18n="My Course">{{ __('Ürün Kategori Ekle') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-file-text"></i>
                <div data-i18n="Academy">{{ __('Proje Kategori') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.project-categories.index') }}" class="menu-link">
                        <div data-i18n="Dashboard">{{ __('Proje Kategori Listesi') }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.project-categories.create') }}" class="menu-link">
                        <div data-i18n="My Course">{{ __('Proje Kategori Ekle') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-briefcase"></i>
                <div data-i18n="Academy">{{ __('Hizmet Kategori') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.service-categories.index') }}" class="menu-link">
                        <div data-i18n="Dashboard">{{ __('Hizmet Kategori Listesi') }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.service-categories.create') }}" class="menu-link">
                        <div data-i18n="My Course">{{ __('Hizmet Kategori Ekle') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-users"></i>
                <div data-i18n="Academy">{{ __('Ekip Kategori') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.team-categories.index') }}" class="menu-link">
                        <div data-i18n="Dashboard">{{ __('Ekip Kategori Listesi') }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.team-categories.create') }}" class="menu-link">
                        <div data-i18n="My Course">{{ __('Ekip Kategori Ekle') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-address-book"></i>
                <div data-i18n="Academy">{{ __('İletişim Kişileri') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.contact-people.index') }}" class="menu-link">
                        <div data-i18n="Dashboard">{{ __('İletişim Kişiler Listesi') }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.contact-people.create') }}" class="menu-link">
                        <div data-i18n="My Course">{{ __('İletişim Kişi Ekle') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-folders"></i>
                <div data-i18n="Academy">{{ __('Dosya Yönetimi') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.files.index') }}" class="menu-link">
                        <div data-i18n="Dashboard">{{ __('Dosya Listesi') }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.files.create') }}" class="menu-link">
                        <div data-i18n="My Course">{{ __('Dosya Ekle') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-message"></i>
                <div data-i18n="Academy">{{ __('Müşteri Yorumları') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.customer-comments.index') }}" class="menu-link">
                        <div data-i18n="Dashboard">{{ __('Müşteri Yorum Listesi') }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.customer-comments.create') }}" class="menu-link">
                        <div data-i18n="My Course">{{ __('Müşteri Yorum Ekle') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-calendar-time"></i>
                <div data-i18n="Academy">{{ __('Tarihçe Yönetimi') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.milestones.index') }}" class="menu-link">
                        <div data-i18n="Dashboard">{{ __('Tarihçe Listesi') }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.milestones.create') }}" class="menu-link">
                        <div data-i18n="My Course">{{ __('Tarihçe Ekle') }}</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.applications.index') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-calendar-check"></i>
                <div data-i18n="Academy">{{ __('Başvurular') }}</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.contact-messages.index') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-message"></i>
                <div data-i18n="Academy">{{ __('İletişim Mesajları') }}</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.newsletters.index') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-mail"></i>
                <div data-i18n="Academy">{{ __('Bülten') }}</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.locales.index') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-language-hiragana"></i>
                <div data-i18n="Academy">{{ __('Dil Düzenle') }}</div>
            </a>
        </li>

    </ul>

</aside>

<div class="menu-mobile-toggler d-xl-none rounded-1">
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
        <i class="ti tabler-menu icon-base"></i>
        <i class="ti tabler-chevron-right icon-base"></i>
    </a>
</div>
<!-- / Menu -->
