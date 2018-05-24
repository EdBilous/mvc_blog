<!-- Page Header -->
<?php $value = $data; ?>
<header class="masthead" style="background-image: url('/img/singlearticle-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1><?php echo $value->title; ?></h1>
                    <h2 class="subheading"><?php echo $value->sub_title; ?></h2>
                    <span class="meta">Автор:
                        <a><?php echo $value->authorLogin; ?></a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-preview">
                    <p><?php echo $value->content; ?>
                        <?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $value->created_at); ?>
                    <p class="post-meta">Пост опубликован: <?= $date->format('F d, Y'); ?></p>
                    <a style="color: brown" href="javascript:history.back()"><
                        <назад
                    </a>
                </div>
            </div>
        </div>
</article>