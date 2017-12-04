<template>
    <!-- Page content -->
    <div class="single-post">
        <article class="post post--boxed">
            <div class="entry-header">
                <div class="entry-meta">
            <span class="byline">
                <a href="#"><img src="#" alt="blog item 01">Runiana </a>
            </span>
                    <span class="date-post">
                <a href="#" class=""><i class="fa fa-clock-o"></i>
                    <time datetime="">{{postData.created_at}}</time></a>
            </span>

                </div>
                <h1 class="entry-title">{{postData.title}}</h1>
                <div class="wrap-social">
                    <ul class="social-links">
                        <li><a href="#"><span class="screen-reader-text">Twitter</span><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><span class="screen-reader-text">Facebook</span><i
                                class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><span class="screen-reader-text">Instagram</span><i class="fa fa-instagram"></i></a>
                        </li>
                        <li><a href="#"><span class="screen-reader-text">Skype</span><i class="fa fa-skype"></i></a>
                        </li>
                        <li><a href="#"><span class="screen-reader-text">Google Plus</span><i
                                class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="entry-content">
                {{postData.content}}
            </div>

            <div class="entry-footer">
                <div class="blog-links">
            <span class="tag-links">
                <span><i class="fa fa-tag"></i>Tags:</span>
                <a href="#">Technology</a>,
                <a href="#">English</a>,
                <a href="#">Learn</a>,
                <a href="#">Fashion</a>
            </span>

                    <span class="cat-links">
                <span><i class="fa fa-folder"></i>Categories:</span>
                <a href="#">Technology</a>,
                <a href="#">English</a>,
                <a href="#">Learn</a>,
                <a href="#">Fashion</a>
            </span>
                </div>
            </div>
        </article>
        <!-- Page content -->
    </div>
</template>
<script>
    export default {
        name: 'post_detail',
        data: () => ({
//            postData: [],
//            //routeData:$route
//        }),
        prop:['postData'],
    }
</script>