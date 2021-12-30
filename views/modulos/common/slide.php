<!-- Carousel container -->
<div id="my-pics" class="carousel slide" data-ride="carousel" style="width:1300px; height: 430px ;margin:auto;">

<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#my-pics" data-slide-to="0" class="active"></li>
<li data-target="#my-pics" data-slide-to="1"></li>
<li data-target="#my-pics" data-slide-to="2"></li>
</ol>

<!-- Content -->
<div class="carousel-inner" role="listbox">

<!-- Slide 1 -->
<div class="item active">
<img src="<?php echo $url; ?>views/dist/img/slide/img1.jpg" style="width:1400px; height: 430px ;" alt="Sunset over beach">
<div class="carousel-caption">
<h3>Estudiantes</h3>
<p>Horarios de clases</p>
</div>
</div>

<!-- Slide 2 -->
<div class="item">
<img src="<?php echo $url; ?>views/dist/img/slide/img2.png"  style="width:1400px; height: 430px ;" alt="Rob Roy Glacier">
<div class="carousel-caption">
<h3>Profesores</h3>
<p>Ver sus cursos</p>
</div>
</div>

<!-- Slide 3 -->
<div class="item">
<img src="<?php echo $url; ?>views/dist/img/slide/img3.jpg"   style="width:1400px; height: 430px ;"alt="Longtail boats at Phi Phi">
<div class="carousel-caption">
<h3>Clases</h3>
<p>Horario de clases por cursos</p>
</div>
</div>

</div>

<!-- Previous/Next controls -->
<a class="left carousel-control" href="#my-pics" role="button" data-slide="prev">
<span class="icon-prev" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#my-pics" role="button" data-slide="next">
<span class="icon-next" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>

</div>