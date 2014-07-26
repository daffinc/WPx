<?php get_header(); ?>

<div class="main grid">

  <aside class="banner-top den-100 clearfix">
    <figure class="banner--top banner--top-1"><img src="http://us.img.e-planning.net/esb/4/0/ea50/402a43c15a04fa21.png" /></figure>
    <figure class="banner--top banner--top-2"><img src="http://us.img.e-planning.net/esb/4/0/ea50/8dcaf6d8ee04d25f.png" /></figure>

  </aside>

  <header class="den-100">
    <h1>Logo</h1>
    <nav>
      <ul>
        <li>Home</li>
        <li>SectionOne</li>
        <li>SectionTwo</li>
      </ul>
    </nav>
  </header>

  <article class="den-1g">
    <h2>Continue Testing</h2>
  </article>


  <!-- den3 to den7 are nested within den2.-->
  <div class="den-100">
    <h2>den 2</h2>
    <div class="den den4">
      <h2>den 4</h2>
    </div>

    <div class="den den5">
      <h2>den 5</h2>
    </div>

    <div class="den den6">
      <h2>den 6</h2>
    </div>

    <!-- den8, den9 and den10 are nested within den7 -->
    <div class="den den7">
      <h2>  <span>Deploying</span>
        <p><i class="fa fa-android fa-lg"></i> fa-camera-retro</p>
        <p><i class="fa fa-camera-retro fa-2x"></i> fa-camera-retro</p>
        <p><i class="fa fa-camera-retro fa-3x"></i> fa-camera-retro</p>
        <p><i class="fa fa-camera-retro fa-4x"></i> fa-camera-retro</p>
        <p><i class="fa fa-camera-retro fa-5x"></i> fa-camera-retro</p></h2>

        <div class="den den8">
          <h2>den 8</h2>
        </div>

        <div class="den den9">
          <h2>den 9</h2>
          <ul class="fa-ul">
            <li><i class="fa-li fa fa-check-square"></i>List icons (like these)</li>
            <li><i class="fa-li fa fa-check-square"></i>can be used</li>
            <li><i class="fa-li fa fa-spinner fa-spin"></i>to replace</li>
            <li><i class="fa-li fa fa-square"></i>default bullets in lists</li>
          </ul>
        </div>

        <div class="den den4-4">
          <h2>den 10</h2>
        </div>

      </div>
      <!-- /den7 -->
    </div>
    <!-- /den2 -->

    <div class="den den3">
      <h2>den 3</h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#"><i class="fa fa-home fa-fw"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-book fa-fw"></i> Library</a></li>
        <li><a href="#"><i class="fa fa-pencil fa-fw"></i> Applications</a></li>
        <li><a href="#"><i class="fa fa-cogs fa-fw"></i> Settings</a></li>
      </ul>
    </div>
    <!-- /den3 -->


    <footer class="clerfix"></footer>

  </div>
  <!-- /container -->





  <?php get_footer(); ?>