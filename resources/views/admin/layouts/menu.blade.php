<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu">
    <div class="app-brand demo">
        <a href="{{ route('admin.index') }}" class="app-brand-link">
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
            <span class="app-brand-text demo menu-text fw-bold ms-3">Admin</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="icon-base ti menu-toggle-icon d-none d-xl-block"></i>
            <i class="icon-base ti tabler-x d-block d-xl-none"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Page -->
        <li class="menu-item {{ menuItemClass('admin.index','child') }}">
            <a href="{{ route('admin.index') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-smart-home"></i>
                <div data-i18n="{{ __('Ana Sayfa') }}">{{ __('Ana Sayfa') }}</div>
            </a>
        </li>
        <li>
            <input type="text" id="menuSearch" placeholder="Menüde ara..." class="form-control mb-2" style="margin: .89rem" >
        </li>
        @if(in_array('page_list', $authUserRoles) || in_array('page_add', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.pages.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-file-info"></i>
                    <div data-i18n="Academy">{{ __('Sayfa') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('page_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.pages.index','child') }}">
                            <a href="{{ route('admin.pages.index') }}" class="menu-link">
                                <div data-i18n="Dashboard">{{ __('Sayfa Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('page_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.pages.create','admin.pages.edit'],'child') }}">
                            <a href="{{ route('admin.pages.create') }}" class="menu-link">
                                <div data-i18n="My Course">{{ __('Sayfa Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif


        {{-- Blog Kategori --}}
        @if(hasAnyRole('blog_category', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.blog-categories.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-book"></i>
                    <div>{{ __('Blog Kategori') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('blog_category_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.blog-categories.index','child') }}">
                            <a href="{{ route('admin.blog-categories.index') }}" class="menu-link">
                                <div>{{ __('Blog Kategori Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('blog_category_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.blog-categories.create','admin.blog-categories.edit'],'child') }}">
                            <a href="{{ route('admin.blog-categories.create') }}" class="menu-link">
                                <div>{{ __('Blog Kategori Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Blog --}}
        @if(hasAnyRole('blog', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.blogs.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-file-text"></i>
                    <div>{{ __('Blog') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('blog_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.blogs.index','child') }}">
                            <a href="{{ route('admin.blogs.index') }}" class="menu-link">
                                <div>{{ __('Blog Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('blog_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.blogs.create','admin.blogs.edit'],'child') }}">
                            <a href="{{ route('admin.blogs.create') }}" class="menu-link">
                                <div>{{ __('Blog Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif


        {{-- Duyuru --}}
        @if(hasAnyRole('announcement', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.announcements.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-bell"></i>
                    <div>{{ __('Duyuru') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('announcement_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.announcements.index','child') }}">
                            <a href="{{ route('admin.announcements.index') }}" class="menu-link">
                                <div>{{ __('Duyuru Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('announcement_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.announcements.create','admin.announcements.edit'],'child') }}">
                            <a href="{{ route('admin.announcements.create') }}" class="menu-link">
                                <div>{{ __('Duyuru Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Katalog Kategori --}}
        @if(hasAnyRole('catalog_category', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.catalog-categories.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-library"></i>
                    <div>{{ __('Katalog Kategori') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('catalog_category_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.catalog-categories.index','child') }}">
                            <a href="{{ route('admin.catalog-categories.index') }}" class="menu-link">
                                <div>{{ __('Katalog Kategori Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('catalog_category_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.catalog-categories.create','admin.catalog-categories.edit'],'child') }}">
                            <a href="{{ route('admin.catalog-categories.create') }}" class="menu-link">
                                <div>{{ __('Katalog Kategori Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Katalog --}}
        @if(hasAnyRole('catalog', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.catalogs.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-file-text"></i>
                    <div>{{ __('Katalog Yönetimi') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('catalog_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.catalogs.index','child') }}">
                            <a href="{{ route('admin.catalogs.index') }}" class="menu-link">
                                <div>{{ __('Katalog Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('catalog_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.catalogs.create','admin.catalogs.edit'],'child') }}">
                            <a href="{{ route('admin.catalogs.create') }}" class="menu-link">
                                <div>{{ __('Katalog Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif


        {{-- Soru Kategori --}}
        @if(hasAnyRole('faq_category', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.faq-categories.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-message-2-question"></i>
                    <div>{{ __('Soru Kategori') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('faq_category_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.faq-categories.index','child') }}">
                            <a href="{{ route('admin.faq-categories.index') }}" class="menu-link">
                                <div>{{ __('Soru Kategori Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('faq_category_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.faq-categories.create','admin.faq-categories.edit'],'child') }}">
                            <a href="{{ route('admin.faq-categories.create') }}" class="menu-link">
                                <div>{{ __('Soru Kategori Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Sıkça Sorulan Soru --}}
        @if(hasAnyRole('faq', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.faqs.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-help-hexagon"></i>
                    <div>{{ __('Sıkça Sorulan Soru') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('faq_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.faqs.index','child') }}">
                            <a href="{{ route('admin.faqs.index') }}" class="menu-link">
                                <div>{{ __('Soru Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('faq_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.faqs.create','admin.faqs.edit'],'child') }}">
                            <a href="{{ route('admin.faqs.create') }}" class="menu-link">
                                <div>{{ __('Soru Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Haber Kategori --}}
        @if(hasAnyRole('news_category', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.news-categories.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-news"></i>
                    <div>{{ __('Haber Kategori') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('news_category_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.news-categories.index','child') }}">
                            <a href="{{ route('admin.news-categories.index') }}" class="menu-link">
                                <div>{{ __('Haber Kategori Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('news_category_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.news-categories.create','admin.news-categories.edit'],'child') }}">
                            <a href="{{ route('admin.news-categories.create') }}" class="menu-link">
                                <div>{{ __('Haber Kategori Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif


        {{-- Haber --}}
        @if(hasAnyRole('news', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.news.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-article"></i>
                    <div>{{ __('Haber') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('news_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.news.index','child') }}">
                            <a href="{{ route('admin.news.index') }}" class="menu-link">
                                <div>{{ __('Haber Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('news_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.news.create','admin.news.edit'],'child') }}">
                            <a href="{{ route('admin.news.create') }}" class="menu-link">
                                <div>{{ __('Haber Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Fotoğraf Kategori --}}
        @if(hasAnyRole('photo_category', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.photo-categories.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-photo"></i>
                    <div>{{ __('Fotoğraf Kategori') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('photo_category_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.photo-categories.index','child') }}">
                            <a href="{{ route('admin.photo-categories.index') }}" class="menu-link">
                                <div>{{ __('Fotoğraf Kategori Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('photo_category_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.photo-categories.create','admin.photo-categories.edit'],'child') }}">
                            <a href="{{ route('admin.photo-categories.create') }}" class="menu-link">
                                <div>{{ __('Fotoğraf Kategori Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Fotoğraf --}}
        @if(hasAnyRole('photo', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.photos.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-camera"></i>
                    <div>{{ __('Fotoğraf') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('photo_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.photos.index','child') }}">
                            <a href="{{ route('admin.photos.index') }}" class="menu-link">
                                <div>{{ __('Fotoğraf Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('photo_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.photos.create','admin.photos.edit'],'child') }}">
                            <a href="{{ route('admin.photos.create') }}" class="menu-link">
                                <div>{{ __('Fotoğraf Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif


        {{-- Video Kategori --}}
        @if(hasAnyRole('video_category', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.video-categories.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-device-tv-old"></i>
                    <div>{{ __('Video Kategori') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('video_category_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.video-categories.index','child') }}">
                            <a href="{{ route('admin.video-categories.index') }}" class="menu-link">
                                <div>{{ __('Video Kategori Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('video_category_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.video-categories.create','admin.video-categories.edit'],'child') }}">
                            <a href="{{ route('admin.video-categories.create') }}" class="menu-link">
                                <div>{{ __('Video Kategori Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Video Yönetimi --}}
        @if(hasAnyRole('video', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.videos.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-video"></i>
                    <div>{{ __('Video Yönetimi') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('video_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.videos.index','child') }}">
                            <a href="{{ route('admin.videos.index') }}" class="menu-link">
                                <div>{{ __('Video Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('video_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.videos.create','admin.videos.edit'],'child') }}">
                            <a href="{{ route('admin.videos.create') }}" class="menu-link">
                                <div>{{ __('Video Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Ürün Kategori --}}
        @if(hasAnyRole('product_category', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.product-categories.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-package"></i>
                    <div>{{ __('Ürün Kategori') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('product_category_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.product-categories.index','child') }}">
                            <a href="{{ route('admin.product-categories.index') }}" class="menu-link">
                                <div>{{ __('Ürün Kategori Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('product_category_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.product-categories.create','admin.product-categories.edit'],'child') }}">
                            <a href="{{ route('admin.product-categories.create') }}" class="menu-link">
                                <div>{{ __('Ürün Kategori Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Ürün --}}
        @if(hasAnyRole('product', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.products.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-package"></i>
                    <div>{{ __('Ürün') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('product_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.products.index','child') }}">
                            <a href="{{ route('admin.products.index') }}" class="menu-link">
                                <div>{{ __('Ürün Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('product_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.products.create','admin.products.edit'],'child') }}">
                            <a href="{{ route('admin.products.create') }}" class="menu-link">
                                <div>{{ __('Ürün Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif


        {{-- Proje Kategori --}}
        @if(hasAnyRole('project_category', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.project-categories.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-file-text"></i>
                    <div>{{ __('Proje Kategori') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('project_category_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.project-categories.index','child') }}">
                            <a href="{{ route('admin.project-categories.index') }}" class="menu-link">
                                <div>{{ __('Proje Kategori Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('project_category_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.project-categories.create','admin.project-categories.edit'],'child') }}">
                            <a href="{{ route('admin.project-categories.create') }}" class="menu-link">
                                <div>{{ __('Proje Kategori Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Proje --}}
        @if(hasAnyRole('project', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.projects.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-checklist"></i>
                    <div>{{ __('Proje') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('project_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.projects.index','child') }}">
                            <a href="{{ route('admin.projects.index') }}" class="menu-link">
                                <div>{{ __('Proje Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('project_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.projects.create','admin.projects.edit'],'child') }}">
                            <a href="{{ route('admin.projects.create') }}" class="menu-link">
                                <div>{{ __('Proje Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Hizmet Kategori --}}
        @if(hasAnyRole('service_category', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.service-categories.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-briefcase"></i>
                    <div>{{ __('Hizmet Kategori') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('service_category_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.service-categories.index','child') }}">
                            <a href="{{ route('admin.service-categories.index') }}" class="menu-link">
                                <div>{{ __('Hizmet Kategori Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('service_category_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.service-categories.create','admin.service-categories.edit'],'child') }}">
                            <a href="{{ route('admin.service-categories.create') }}" class="menu-link">
                                <div>{{ __('Hizmet Kategori Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif


        {{-- Hizmet --}}
        @if(hasAnyRole('service', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.services.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-briefcase-2"></i>
                    <div>{{ __('Hizmet') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('service_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.services.index','child') }}">
                            <a href="{{ route('admin.services.index') }}" class="menu-link">
                                <div>{{ __('Hizmet Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('service_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.services.create','admin.services.edit'],'child') }}">
                            <a href="{{ route('admin.services.create') }}" class="menu-link">
                                <div>{{ __('Hizmet Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Ekip Kategori --}}
        @if(hasAnyRole('team_category', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.team-categories.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-users"></i>
                    <div>{{ __('Ekip Kategori') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('team_category_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.team-categories.index','child') }}">
                            <a href="{{ route('admin.team-categories.index') }}" class="menu-link">
                                <div>{{ __('Ekip Kategori Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('team_category_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.team-categories.create','admin.team-categories.edit'],'child') }}">
                            <a href="{{ route('admin.team-categories.create') }}" class="menu-link">
                                <div>{{ __('Ekip Kategori Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Ekip Yönetimi --}}
        @if(hasAnyRole('team', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.teams.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-user-plus"></i>
                    <div>{{ __('Ekip Yönetimi') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('team_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.teams.index','child') }}">
                            <a href="{{ route('admin.teams.index') }}" class="menu-link">
                                <div>{{ __('Ekip Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('team_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.teams.create','admin.teams.edit'],'child') }}">
                            <a href="{{ route('admin.teams.create') }}" class="menu-link">
                                <div>{{ __('Ekip Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif


        {{-- İletişim Kişileri --}}
        @if(hasAnyRole('contact_people', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.contact-people.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-address-book"></i>
                    <div>{{ __('İletişim Kişileri') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('contact_people_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.contact-people.index','child') }}">
                            <a href="{{ route('admin.contact-people.index') }}" class="menu-link">
                                <div>{{ __('İletişim Kişiler Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('contact_people_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.contact-people.create','admin.contact-people.edit'],'child') }}">
                            <a href="{{ route('admin.contact-people.create') }}" class="menu-link">
                                <div>{{ __('İletişim Kişi Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Dosya Yönetimi --}}
        @if(hasAnyRole('file', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.files.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-folders"></i>
                    <div>{{ __('Dosya Yönetimi') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('file_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.files.index','child') }}">
                            <a href="{{ route('admin.files.index') }}" class="menu-link">
                                <div>{{ __('Dosya Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('file_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.files.create','admin.files.edit'],'child') }}">
                            <a href="{{ route('admin.files.create') }}" class="menu-link">
                                <div>{{ __('Dosya Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Müşteri Yorumları --}}
        @if(hasAnyRole('customer_comment', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.customer-comments.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-message"></i>
                    <div>{{ __('Müşteri Yorumları') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('customer_comment_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.customer-comments.index','child') }}">
                            <a href="{{ route('admin.customer-comments.index') }}" class="menu-link">
                                <div>{{ __('Müşteri Yorum Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('customer_comment_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.customer-comments.create','admin.customer-comments.edit'],'child') }}">
                            <a href="{{ route('admin.customer-comments.create') }}" class="menu-link">
                                <div>{{ __('Müşteri Yorum Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif


        {{-- Tarihçe Yönetimi --}}
        @if(hasAnyRole('milestone', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.milestones.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-calendar-time"></i>
                    <div>{{ __('Tarihçe Yönetimi') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('milestone_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.milestones.index','child') }}">
                            <a href="{{ route('admin.milestones.index') }}" class="menu-link">
                                <div>{{ __('Tarihçe Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('milestone_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.milestones.create','admin.milestones.edit'],'child') }}">
                            <a href="{{ route('admin.milestones.create') }}" class="menu-link">
                                <div>{{ __('Tarihçe Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Referans Yönetimi --}}
        @if(hasAnyRole('reference', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.references.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-mood-check"></i>
                    <div>{{ __('Referans Yönetimi') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('reference_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.references.index','child') }}">
                            <a href="{{ route('admin.references.index') }}" class="menu-link">
                                <div>{{ __('Referans Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('reference_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.references.create','admin.references.edit'],'child') }}">
                            <a href="{{ route('admin.references.create') }}" class="menu-link">
                                <div>{{ __('Referans Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Slider Yönetimi --}}
        @if(hasAnyRole('slider', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.sliders.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-slideshow"></i>
                    <div>{{ __('Slider Yönetimi') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('slider_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.sliders.index','child') }}">
                            <a href="{{ route('admin.sliders.index') }}" class="menu-link">
                                <div>{{ __('Slider Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('slider_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.sliders.create','admin.sliders.edit'],'child') }}">
                            <a href="{{ route('admin.sliders.create') }}" class="menu-link">
                                <div>{{ __('Slider Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif


        {{-- Kullanıcı Yönetimi --}}
        @if(hasAnyRole('user', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.users.*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-user"></i>
                    <div>{{ __('Kullanıcı Yönetimi') }}</div>
                </a>
                <ul class="menu-sub">
                    @if(in_array('user_list', $authUserRoles))
                        <li class="menu-item {{ menuItemClass('admin.users.index','child') }}">
                            <a href="{{ route('admin.users.index') }}" class="menu-link">
                                <div>{{ __('Kullanıcı Listesi') }}</div>
                            </a>
                        </li>
                    @endif
                    @if(in_array('user_add', $authUserRoles))
                        <li class="menu-item {{ menuItemClass(['admin.users.create','admin.users.edit'],'child') }}">
                            <a href="{{ route('admin.users.create') }}" class="menu-link">
                                <div>{{ __('Kullanıcı Ekle') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        {{-- Başvurular --}}
        @if(in_array('application_list', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.applications.index','child') }}">
                <a href="{{ route('admin.applications.index') }}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-calendar-check"></i>
                    <div>{{ __('Başvurular') }}</div>
                </a>
            </li>
        @endif

        {{-- İletişim Mesajları --}}
        @if(in_array('contact_messages_list', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.contact-messages.index','child') }}">
                <a href="{{ route('admin.contact-messages.index') }}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-message"></i>
                    <div>{{ __('İletişim Mesajları') }}</div>
                </a>
            </li>
        @endif

        {{-- Bülten --}}
        @if(in_array('newsletter_list', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.newsletters.index','child') }}">
                <a href="{{ route('admin.newsletters.index') }}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-mail"></i>
                    <div>{{ __('Bülten') }}</div>
                </a>
            </li>
        @endif

        {{-- Dil Düzenle --}}
        @if(in_array('locale_list', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.locales.index','child') }}">
                <a href="{{ route('admin.locales.index') }}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-flag"></i>
                    <div>{{ __('Dil Düzenle') }}</div>
                </a>
            </li>
            {{-- Çeviriler --}}
            <li class="menu-item {{ menuItemClass('admin.translations','child') }}">
                <a href="{{ route('admin.translations') }}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-language"></i>
                    <div>{{ __('Çeviriler') }}</div>
                </a>
            </li>
        @endif



        {{-- Ayarlar --}}
        @if(in_array('setting_list', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.settings.index','child') }}">
                <a href="{{ route('admin.settings.index') }}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-settings"></i>
                    <div>{{ __('Ayarlar') }}</div>
                </a>
            </li>
        @endif

        {{-- Yetkilendirme --}}
        @if(in_array('role_group_list', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.role-groups.index','child') }}">
                <a href="{{ route('admin.role-groups.index') }}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-shield"></i>
                    <div>{{ __('Yetkilendirme') }}</div>
                </a>
            </li>
        @endif

        {{-- Statik Dosyalar --}}
        @if(in_array('file_list', $authUserRoles))
            <li class="menu-item {{ menuItemClass('admin.static-files.index','child') }}">
                <a href="{{ route('admin.static-files.index') }}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-file-isr"></i>
                    <div>{{ __('Statik Dosyalar') }}</div>
                </a>
            </li>
        @endif

        <li class="menu-header small">
            <span class="menu-header-text" data-i18n="Oturum">Oturum</span>
        </li>
        <li class="menu-item">
            <a href="#"
               class="menu-link"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="menu-icon icon-base ti tabler-logout"></i>
                <div data-i18n="Çıkış Yap">Çıkış Yap</div>
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
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
