@extends('theme19.pages.build')
@section('title',$blog->name)
@section('meta_keywords',$blog->meta_keywords)
@section('meta_description',$blog->meta_description)
@section('content')
    <!-- blog details wrapper v2 -->
    <section class="blog-details-wrapper-v2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-banner">
                        <div class="blog-details-title">
                            <h3>Effective Tax Planning Strategies for Businesses</h3>
                            <h4>Stay informed with the latest legal news, articles, and insights from our experts
                            </h4>
                            <div class="post-activity">
                                <div class="content">
                                    <p>April 28, 2024</p>
                                    <p><a href="#">Michael Johnson</a></p>
                                    <p>Category: Tax Law</p>
                                    <p>Likes: 25</p>
                                    <p>Comments: 03</p>
                                </div>
                            </div>
                        </div>
                        <div class="banner">
                            <img src="/theme19/image/left-side-blog/big-banner.jpg" alt="blog banner">
                        </div>
                        <div class="banner-heading">
                            <h4>"Proper tax planning can save your business money and   avoid potential legal issues.
                                In this article, we outline effective strategies to help businesses manage their tax
                                obligations efficiently</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-tex-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="blog-tex-content">
                            <h3>Understanding Tax Obligations</h3>
                            <p>Effective tax planning begins with a thorough understanding of your business's tax obligations. This includes being aware of federal, state, and local tax requirements, as well as any industry-specific taxes. Regularly updating yourself on tax laws and regulations is crucial to ensure compliance and avoid penalties</p>
                            <p class="quote">“Effective tax planning is not just about reducing liabilities, but also about ensuring compliance with legal requirements”</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="tax-banner">
                            <img src="/theme19/image/blog-details/tex-banner-2.jpg" alt="tex banner">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
